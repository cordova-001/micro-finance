<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\LoanProduct;
use App\Models\Branch;
use App\Models\Customers;
use carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\LoanRepaymentSchedule; 
use App\Models\JournalEntry;
use App\Models\GeneralLedger;
use App\Models\BankAccount;
use App\Models\Chart;
use App\Models\Loans;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoanManagementController extends Controller
{
    public function newNewLoan()
    {
        $user = Auth::user();
        $branches = Branch::where('business_id', $user->business_id)->get();
        $customers = Customers::where('business_id', $user->business_id)->get();
        $lproduct = LoanProduct::where('business_id', $user->business_id)->get();  
        $bank_accounts = BankAccount::where('business_id', $user->business_id)->get(); 
        
        // dd($customers);
        return view('loan.request_loan', compact('customers', 'user', 'lproduct', 'branches', 'bank_accounts'));
    }

    public function processLoan(Request $request)
{
    try {
        $user = Auth::user();
        $request->validate([
            'account_number' => 'required',
            'loan_product' => 'required',
            'loan_amount' => 'required|numeric',
            'frequency' => 'required',
            'branch_id' => 'required',
            'application_date' => 'required|date',
            'repayment_period' => 'required|numeric|min:1',
        ]);

        $business_id = $user->business_id;
        $account_number = $request->account_number;
        $loan_product = $request->loan_product;
        $bank_account = $request->bank_account;
        $interest_type = $request->interest_type;
        $bank_name = $request->bank_name;
        $interest_type = $request->interest_type;

        // dd($interest_type);
        $loan_amount = $request->loan_amount;
        $frequency = $request->frequency;
        $branch_id = $request->branch_id;
        $application_date = $request->application_date;
        $repayment_period = $request->repayment_period;
        $staff = $request->staff;

        // Get account details
        $account_details = Customers::where('customer_id', $account_number)->first();
        if (!$account_details) {
            return redirect()->back()->with('error', 'Invalid account number')->withInput();
        }

        // Get loan product details
        $getLoanProduct = LoanProduct::where('loan_product', $loan_product)
            ->where('business_id', $business_id)
            ->first();

        if (!$getLoanProduct) {
            return redirect()->back()->with('error', 'Invalid loan product selected')->withInput();
        }

        // Validate loan amount
        if ($loan_amount < $getLoanProduct->minimum_amount || $loan_amount > $getLoanProduct->maximum_amount) {
            return redirect()->back()->with('error', 'Loan amount must be between ' . $getLoanProduct->minimum_amount . ' and ' . $getLoanProduct->maximum_amount)->withInput();
        }

        $interest_rate = $getLoanProduct->interest_rate;
        // $interest_type = $getLoanProduct->interest_type; // 'flat' or 'reducing'
        $total_repayment_amount = 0;
        $interest_amount = 0;

        if ($interest_type === 'flat') {
            // Flat interest calculation
            $interest_amount = ($loan_amount * $interest_rate / 100) * $repayment_period;
            $total_repayment_amount = $loan_amount + $interest_amount;
        } elseif ($interest_type === 'reducing') {
            // Reducing balance interest calculation
            $remaining_principal = $loan_amount;
            for ($i = 0; $i < $repayment_period; $i++) {
                $current_interest = $remaining_principal * $interest_rate / 100;
                $interest_amount += $current_interest;
                $principal_payment = $loan_amount / $repayment_period;
                $remaining_principal -= $principal_payment;
            }
            $total_repayment_amount = $loan_amount + $interest_amount;
        } else {
            return redirect()->back()->with('error', 'Invalid interest type specified for the loan product')->withInput();
        }

        // dd($total_repayment_amount);

        $each_repayment_amount = $total_repayment_amount / $repayment_period;

        Loans::create([
            'loan_product' => $loan_product,
            'loan_amount' => $loan_amount,
            'total_repayment_amount' => $total_repayment_amount,
            'total_due' => $total_repayment_amount,
            'each_repayment_amount' => $each_repayment_amount,
            'interest_rate' => $interest_rate,
            'interest_amount' => $interest_amount,
            'repayment_period' => $repayment_period,
            'interest_type' => $interest_type,
            'frequency' => $frequency,
            'application_date' => $application_date,
            'bank_account' => $bank_account,
            'staff' => $staff,
            'business_id' => $business_id,
            'branch_id' => $branch_id,
            'customer_id' => $account_number,
            'total_paid' => 0,
            'balance' => $total_repayment_amount, // Initial balance is the total repayment amount
            'bank_name' => $bank_name, 
        ]);

        return redirect()->back()->with('success', 'The application for loan has been submitted for review');

    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Validation error processing loan: ', $e->errors());
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('Error processing loan: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
    }
}

    public function getLoan(Request $request)
    {
        try{
        
            $user = Auth::user();            
            $allLoans = DB::table('loans')
            ->join('customers', 'loans.customer_id', '=', 'customers.customer_id')
            ->where('loans.business_id', $user->business_id)
            ->where('loans.status', 'Pending')
            ->select('loans.*', 'customers.first_name', 'customers.last_name')
            ->get();

            // dd('allLoans');

            return view('loan.loan_management', compact('user', 'allLoans'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error fetching loan: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error fetching loan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
        }
    }

    

    public function getApprovedLoan(Request $request)
    {
        try{
        
            $user = Auth::user();            
            $allLoans = DB::table('loans')
            ->join('customers', 'loans.customer_id', '=', 'customers.customer_id')
            ->where('loans.business_id', $user->business_id)
            ->where('loans.status', 'Approved')
            ->select('loans.*', 'customers.first_name', 'customers.last_name')
            ->get();

            // dd('allLoans');

            return view('loan.approved_loan', compact('user', 'allLoans'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error fetching loan: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error fetching loan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
        }
    }

    public function getDisbursedLoan(Request $request)
    {
        try{
        
            $user = Auth::user();            
            $allLoans = DB::table('loans')
            ->join('customers', 'loans.customer_id', '=', 'customers.customer_id')
            ->where('loans.business_id', $user->business_id)
            ->where('loans.status', 'Open')
            ->select('loans.*', 'customers.first_name', 'customers.last_name')
            ->get();

            // dd('allLoans');

            return view('loan.disbursed_loan', compact('user', 'allLoans'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error fetching loan: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error fetching loan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
        }
    }

    public function getRejectedLoan(Request $request)
    {
        try{
        
            $user = Auth::user();            
            $allLoans = DB::table('loans')
            ->join('customers', 'loans.customer_id', '=', 'customers.customer_id')
            ->where('loans.business_id', $user->business_id)
            ->where('loans.status', 'Rejected')
            ->select('loans.*', 'customers.first_name', 'customers.last_name')
            ->get();

            // dd('allLoans');

            return view('loan.rejected_loan', compact('user', 'allLoans'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error fetching loan: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error fetching loan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
        }
    }


    public function newGuarantor()
    {
        $user = Auth::user();
        $branch = Branch::where('business_id', $user->business_id)->get();
        return view ('loan.guarantor', compact('branch'));

    }


    public function manageLoan($id)
    {
        $user = Auth::user();
        $business_id = Auth::user()->business_id;
        $loan = Loans::where('id', $id)->where('business_id', $business_id)->firstOrFail();        
        $fetchedloan = LoanRepaymentSchedule::where('loan_id', $loan->id)->where('business_id', $business_id)->get();
        // dd($fetchedloan);
    
        return view('loan.manage_loan', compact('loan', 'fetchedloan', 'business_id', 'user'));
    }

    public function manageDisbursedLoan($id)
    {
        $user = Auth::user();
        $business_id = Auth::user()->business_id;
        $loan = Loans::where('id', $id)->where('business_id', $business_id)->firstOrFail();        
        $fetchedloan = LoanRepaymentSchedule::where('loan_id', $loan->id)->where('business_id', $business_id)->get();
        // dd($fetchedloan);
    
        return view('loan.manage_disbursed_loan', compact('loan', 'fetchedloan', 'business_id', 'user'));
    }

    public function approveLoanStatus(Request $request, $id)
    {
        
        try{
        $business_id = Auth::user()->business_id;
        
        $loan = Loans::findOrFail($id);

        $loan->update(['status' => 'Approved']);
        

        return redirect()->back()->with('success', 'The loan has been approved successfully.');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Failed to update the loan.');
        }
        
    }

    // public function disburseLoanStatus(Request $request, $id)
    // {
        
    //     try{
    //     $business_id = Auth::user()->business_id;
        
    //     $loan = Loans::findOrFail($id);

    //     $loan->update(['status' => 'Disbursed']);
        

    //     return redirect()->back()->with('success', 'The loan has been approved successfully.');
    //     } catch (\Exception $e){
    //         return redirect()->back()->with('error', 'Failed to update the loan.');
    //     }
        
    // }

    public function generateRepaymentScheduleType($id)
    {
        $business_id = Auth::user()->business_id;
        $loan = Loans::where('id', $id)->where('business_id', $business_id)->first();
        $account_number = $loan->customer_id;

        $amount = $loan->loan_amount;
        $interestRate = $loan->interest_rate / 100; // Convert percentage to decimal
        $frequency = strtolower($loan->repayment_period); // daily, weekly, monthly
        // dd($frequency);
        $duration = $loan->frequency; // Number of days, weeks or months
        $startDate = Carbon::parse($loan->first_due_date);

        // Determine number of payments & interval
        if ($frequency === 'daily') {
            $installments = $duration;
            $interval = 'addDays';
        } elseif ($frequency === 'weekly') {
            $installments = $duration;
            $interval = 'addWeeks';
        } elseif ($frequency === 'monthly') {
            $installments = $duration;
            $interval = 'addMonths';
        } else {
            return redirect()->back()->with('error', 'Invalid Frequency');
        }

        if ($loan->interest_type === 'flat') {
            // Flat Interest Calculation
            $totalInterest = $amount * $interestRate * $installments;
            $totalRepayable = $amount + $totalInterest;
            $installmentAmount = $totalRepayable / $installments;
            $interestPerInstallment = $totalInterest / $installments;
            $principalPerInstallment = $amount / $installments;

            for ($i = 0; $i < $installments; $i++) {
                LoanRepaymentSchedule::create([
                    'loan_id' => $loan->id,
                    'principal_amount' => $principalPerInstallment,
                    'interest_amount' => $interestPerInstallment,
                    'total_amount_due' => $installmentAmount,
                    'due_date' => $startDate->copy()->$interval($i),
                    'status' => 'Pending',                    
                    'business_id' => $business_id,
                    'branch_id' => $loan->branch_id,
                    'customer_id' => $account_number,
                ]);
            }
        } else {
            // Reducing Balance Interest Calculation
            $remainingBalance = $amount;

            for ($i = 0; $i < $installments; $i++) {
                $interestAmount = $remainingBalance * $interestRate;
                $installmentAmount = ($amount / $installments) + $interestAmount;
                $principalAmount = $installmentAmount - $interestAmount;

                // Reduce balance for next calculation
                $remainingBalance -= $principalAmount;

                LoanRepaymentSchedule::create([
                    'loan_id' => $loan->id,
                    'principal_amount' => $principalAmount,
                    'interest_amount' => $interestAmount,
                    'total_amount_due' => $installmentAmount,
                    'due_date' => $startDate->copy()->$interval($i),
                    'status' => 'Pending',
                    'business_id' => $business_id,
                    'branch_id' => $loan->branch_id,
                    'customer_id' => $account_number,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Repayment schedule generated successfully');
    }

    public function getBankAccount()
    {
        try{
        $business_id = Auth::user()->business_id;        
        $bank_accounts = BankAccount::where('business_id', $business_id)->get();
        return view('loan.request_loan', compact('bank_accounts'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to get bank account: ' . $e->getMessage());
        }
    }

    public function disburseAndGenerateSchedule1(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $business_id = Auth::user()->business_id;
            $loan = Loans::findOrFail($id);

            // Check if a repayment schedule already exists for the loan
            $scheduleExists = LoanRepaymentSchedule::where('loan_id', $loan->id)->exists();

            if ($scheduleExists) {
                // If schedule exists, just update loan status if not already "Disbursed"
                if ($loan->status !== 'Open') {
                    $loan->update(['status' => 'Open']);
                }
                return redirect()->back()->with('success', 'Loan status updated to Disbursed.');
            }

            // Update loan status to "Disbursed"
            $loan->update(['status' => 'Open']);

            // Loan details
            $account_number = $loan->customer_id;
            $amount = $loan->loan_amount;
            $amount = (float) $amount;
            $interestRate = $loan->interest_rate / 100; // Convert percentage to decimal
            $frequency = strtolower($loan->repayment_period); // daily, weekly, monthly
            $duration = $loan->frequency; // Number of days, weeks, or months
            $startDate = Carbon::parse($loan->first_due_date);

            // Determine number of payments & interval
            if ($frequency === 'daily') {
                $installments = $duration;
                $interval = 'addDays';
            } elseif ($frequency === 'weekly') {
                $installments = $duration;
                $interval = 'addWeeks';
            } elseif ($frequency === 'monthly') {
                $installments = $duration;
                $interval = 'addMonths';
            } else {
                return redirect()->back()->with('error', 'Invalid Frequency');
            }

            if ($loan->interest_type === 'flat') {
                // Flat Interest Calculation
                $totalInterest = $amount * $interestRate * $installments;
                $totalRepayable = $amount + $totalInterest;
                $installmentAmount = $totalRepayable / $installments;
                $interestPerInstallment = $totalInterest / $installments;
                $principalPerInstallment = $amount / $installments;

                for ($i = 0; $i < $installments; $i++) {
                    LoanRepaymentSchedule::create([
                        'loan_id' => $loan->id,
                        'principal_amount' => $principalPerInstallment,
                        'interest_amount' => $interestPerInstallment,
                        'total_amount_due' => $installmentAmount,
                        'due_date' => $startDate->copy()->$interval($i),
                        'status' => 'Pending',
                        'business_id' => $business_id,
                        'branch_id' => $loan->branch_id,
                        'customer_id' => $account_number,
                    ]);
                }
            } else {
                // Reducing Balance Interest Calculation
                $remainingBalance = $amount;

                for ($i = 0; $i < $installments; $i++) {
                    $interestAmount = $remainingBalance * $interestRate;
                    $installmentAmount = ($amount / $installments) + $interestAmount;
                    $principalAmount = $installmentAmount - $interestAmount;

                    // Reduce balance for next calculation
                    $remainingBalance -= $principalAmount;

                    LoanRepaymentSchedule::create([
                        'loan_id' => $loan->id,
                        'principal_amount' => $principalAmount,
                        'interest_amount' => $interestAmount,
                        'total_amount_due' => $installmentAmount,
                        'due_date' => $startDate->copy()->$interval($i),
                        'status' => 'Pending',
                        'business_id' => $business_id,
                        'branch_id' => $loan->branch_id,
                        'customer_id' => $account_number,
                    ]);
                }
            }

             // Generate unique transaction ID for ledger entries
                $transaction_id = substr(Str::uuid()->toString(), 0, 15);


                $cashPreviousBalance = GeneralLedger::where('account_number', '100')->sum('debit') - GeneralLedger::where('account_number', '100')->sum('credit');

                // Rule of thumb: Debit what comes in, credit what goes out ie debit receiver and credit giver

                // ✅ 1. Credit Loan Account (Asset)
                GeneralLedger::create([
                    'business_id' => $business_id,
                    'branch_id' => $loan->branch_id,
                    'transaction_id' => $transaction_id,
                    'transaction_type' => 'Loan Disbursement',
                    'account_name' => 'Cash' . ' ' . $loan->bank_account,
                    'account_number' => '100', // Assume this is the loan disbursement account
                    'debit' => 0,
                    'credit' => $amount,
                    'balance' => $cashPreviousBalance - $amount,
                    'transaction_date' => now(),
                    'description' => 'Loan disbursed to customer', // 	Aina Eniola - Loan# 1000002 - Principal Disbursed  $account_number, $amount
                    'created_by' => $user->name,
                ]);

                $customerPreviousBalance = GeneralLedger::where('account_number', $account_number)->sum('debit') - GeneralLedger::where('account_number', $account_number)->sum('credit');

                // ✅ 2. Debit Customer Loan Account (Receivable)
                GeneralLedger::create([
                    'business_id' => $business_id,
                    'branch_id' => $loan->branch_id,
                    'transaction_id' => $transaction_id,
                    'transaction_type' => 'Loan Receivable',
                    'account_name' => 'Customer Loan Account',
                    'account_number' => $account_number, // Customer’s account number
                    'debit' => $amount,
                    'credit' => 0,
                    'balance' => $customerPreviousBalance + $amount,
                    'transaction_date' => now(),
                    'description' => 'Loan received by customer',
                    'created_by' => $user->name,
                ]);

                // $balance_two = GeneralLedger::where('account_number', $account_number)->sum('debit') - GeneralLedger::where('account_number', $account_number)->sum('credit') + $amount,

                // dd($balance_two, $amount, $balance_two - $amount);

            return redirect()->back()->with('success', 'Loan disbursed and repayment schedule generated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to process the loan: ' . $e->getMessage());
        }
    }

    public function disburseAndGenerateSchedule(Request $request, $id)
    {
        DB::beginTransaction();
        
        try {
            $user = Auth::user();
            $business_id = $user->business_id;
            $loan = Loans::findOrFail($id);

            $scheduleExists = LoanRepaymentSchedule::where('loan_id', $loan->id)->exists();

            if ($scheduleExists) {
                if ($loan->status !== 'Open') {
                    $loan->update(['status' => 'Open']);
                }
                return redirect()->back()->with('success', 'Loan status updated to Disbursed.');
            }

            $loan->update(['status' => 'Open']);

            $account_number = $loan->customer_id;
            $amount = (float) $loan->loan_amount;
            $interestRate = $loan->interest_rate / 100;
            $frequency = strtolower($loan->frequency);
            $duration = $loan->repayment_period;
            $startDate = Carbon::parse($loan->first_due_date);

            $interval = match ($frequency) {
                'daily' => 'addDays',
                'weekly' => 'addWeeks',
                'monthly' => 'addMonths',
                default => throw new \Exception('Invalid Frequency'),
            }; 

            if (!$loan->loan_amount || !$loan->interest_rate || !$loan->repayment_period) {
                throw new \Exception('Invalid loan data.');
            }
            
            $installments = $duration;

            if ($loan->interest_type === 'flat') {
                $totalInterest = $amount * $interestRate * $installments;
                $totalRepayable = $amount + $totalInterest;
                $installmentAmount = $totalRepayable / $installments;
                $interestPerInstallment = $totalInterest / $installments;
                $principalPerInstallment = $amount / $installments;            
            
                for ($i = 0; $i < $installments; $i++) {
                    LoanRepaymentSchedule::create([
                        'loan_id' => $loan->id,
                        'principal_amount' => $principalPerInstallment,
                        'interest_amount' => $interestPerInstallment,
                        'total_amount_due' => $installmentAmount,
                        'due_date' => $startDate->copy()->$interval($i),
                        'status' => 'Pending',
                        'business_id' => $business_id,
                        'branch_id' => $loan->branch_id,
                        'customer_id' => $account_number,
                    ]);
                }
            
            } elseif ($loan->interest_type === 'reducing') {
                $remainingPrincipal = $amount;
                $principalPerInstallment = $amount / $installments;
            
                for ($i = 0; $i < $installments; $i++) {
                    $interestForInstallment = $remainingPrincipal * $interestRate;
                    $installmentAmount = $principalPerInstallment + $interestForInstallment;
            
                    LoanRepaymentSchedule::create([
                        'loan_id' => $loan->id,
                        'principal_amount' => $principalPerInstallment,
                        'interest_amount' => $interestForInstallment,
                        'total_amount_due' => $installmentAmount,
                        'due_date' => $startDate->copy()->$interval($i),
                        'status' => 'Pending',
                        'business_id' => $business_id,
                        'branch_id' => $loan->branch_id,
                        'customer_id' => $account_number,
                    ]);
            
                    // Reduce the principal after each installment
                    $remainingPrincipal -= $principalPerInstallment;
                }
            }
            

            $transaction_id = substr(Str::uuid()->toString(), 0, 15);

            $cashAmount = Chart::where('account_name', 'Cash')->value('account_number');
            $loanReceivable = Chart::where('account_name', 'Loan Receivable')->value('account_number'); 

            $cashPreviousBalance = GeneralLedger::where('account_number', $cashAmount)->sum('debit') 
                - GeneralLedger::where('account_number', $cashAmount)->sum('credit');

            $customerPreviousBalance = GeneralLedger::where('account_number', $loanReceivable)->sum('debit') 
                - GeneralLedger::where('account_number', $loanReceivable)->sum('credit');
            

            // ✅ General Ledger Entries
            GeneralLedger::create([
                'business_id' => $business_id,
                'branch_id' => $loan->branch_id,
                'transaction_id' => $transaction_id,
                'transaction_type' => 'Loan Disbursement',
                'account_name' => 'Cash ',
                'account_number' => $cashAmount,
                'debit' => 0,
                'credit' => $amount,
                'balance' => $cashPreviousBalance - $amount,
                'transaction_date' => now(),
                'description' => 'Loan disbursed to customer',
                'created_by' => $user->name,
            ]);

            GeneralLedger::create([
                'business_id' => $business_id,
                'branch_id' => $loan->branch_id,
                'transaction_id' => $transaction_id,
                'transaction_type' => 'Loan Receivable',
                'account_name' => 'Loan Receivable',
                'account_number' => $loanReceivable,
                'debit' => $amount,
                'credit' => 0,
                'balance' => $customerPreviousBalance + $amount,
                'transaction_date' => now(),
                'description' => 'Loan received by customer',
                'created_by' => $user->name,
            ]);

            // ✅ Journal Entry - Credit Cash Account
            JournalEntry::create([
                'business_id' => $business_id,
                'branch_id' => $loan->branch_id,
                'transaction_id' => $transaction_id,
                'transaction_type' => 'Loan Receivable',
                'account_name' => 'Cash ' . $loan->bank_account,
                'account_number' => $cashAmount,
                'balance' => $cashPreviousBalance - $amount,
                'debit' => 0,
                'credit' => $amount,
                'transaction_date' => now(),
                'description' => 'Credit Cash Account for loan disbursement',
                'created_by' => $user->name,
            ]);

            // ✅ Journal Entry - Debit Customer Loan Account
            JournalEntry::create([
                'business_id' => $business_id,
                'branch_id' => $loan->branch_id,
                'transaction_id' => $transaction_id,
                'transaction_type' => 'Loan Receivable',
                'account_name' => 'Loan Receivable',
                'account_number' => $loanReceivable,
                'debit' => $amount,
                'credit' => 0,
                'balance' => $customerPreviousBalance + $amount,
                'transaction_date' => now(),
                'description' => 'Debit Customer Loan Account for loan disbursement',
                'created_by' => $user->name,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Loan disbursed and repayment schedule generated successfully.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to process the loan: ' . $e->getMessage());
        }
    }




    public function rejectLoanStatus(Request $request, $id)
    {
        
        try{
        $business_id = Auth::user()->business_id;

        $loan = Loans::findOrFail($id);

        $loan->update(['status' => 'Rejected']);        

        return redirect()->back()->with('success', 'The loan has been rejected.');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Failed to update the loan.');
        }
        
    }

    public function updateLoan(Request $request, $id)
    {
        
        try{
        $business_id = Auth::user()->business_id;
         $loan = Loans::findOrFail('id', $id);

        $validated =  $request->validate([
            'account_number' => 'required',
            'loan_product' => 'required',
            'loan_amount' => 'required',
            'frequency' => 'required',
            'branch_id' => 'required',
            'application_date' => 'required',
            'repayment_period' => 'required',
        ]);

        $loan->update(['status' => 'Approved']);

        $loan->update($validated);

        return redirect()->route('loan.edit')->with('success', 'The loan updated successfully.');
        } catch (\Exception $e){
            return redirect()->route('branch.edit')->with('error', 'Failed to update the loan.');
        }

        
    }
}
