<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanRepaymentSchedule;
use App\Models\Loans;
use App\Models\Customers;
use Carbon\Carbon;
use App\Models\Branch;
use App\Models\LoanProduct;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\GeneralLedger;
use App\Models\LoanRepayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanRepaymentManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function viewRepayment()
    // {
    //     $business_id = Auth::user()->business_id;
    //     $loans = Loans::where('business_id', $business_id)->get();
    //     return view('loan.view_repayment', compact('loans'));
    // }
    public function generateRepaymentSchedule($id)
    {
        $business_id = Auth::user()->business_id;
        $loan = Loans::where('id', $id)->where('business_id', $business_id)->first();
        $account_number = $loan->customer_id;

        $amount = $loan->loan_amount;
        $interestRate = $loan->interest_rate / 100; // Convert percentage to decimal
        $frequency = strtolower($loan->frequency); // daily, weekly, monthly
        
        $duration = $loan->repayment_period; // Number of days, weeks or months
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
            
            // Log::error('Invalid Frequency: ' . $frequency);
            return redirect()->back()->with('error', 'Invalid Frequency ' . $frequency);
            // return response()->json(['frequency' => $frequency]);

            

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


    /**
     * Fetch repayment schedule with loan id
     */


     public function fetchRepaymentSchedule($id)
    {
        $user = Auth::user();
        $business_id = Auth::user()->business_id;
        $fetchedloan = LoanRepaymentSchedule::where('id', $id)->where('business_id', $business_id)->firstOrFail();
    
        return view('loan.manage_loan', compact('fetchedloan', 'business_id', 'user'));
    }



    public function getLoanRepayment(Request $request)
    {
        try{        
            $user = Auth::user();            
            $allLoans = DB::table('loan_repayments')
            ->join('loans', 'loan_repayments.loan_id', '=', 'loans.id')
            ->join('customers', 'loans.customer_id', '=', 'customers.customer_id')
            ->where('loan_repayments.business_id', $user->business_id)
            ->select('loan_repayments.*', 'customers.first_name', 'customers.last_name')
            ->get();

            // dd('allLoans');

            return view('loan.view_repayment', compact('user', 'allLoans'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error fetching loan: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error fetching loan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
        }
    }

    public function getBranchLoanRepayment(Request $request)
    {
        try{        
            $user = Auth::user();            
            $allLoans = DB::table('loan_repayments')
            ->join('loans', 'loan_repayments.loan_id', '=', 'loans.id')
            ->join('customers', 'loans.customer_id', '=', 'customers.customer_id')
            ->where('loan_repayments.business_id', $user->business_id)
            ->where('loans.branch_id', $user->branch_id)
            ->select('loan_repayments.*', 'customers.first_name', 'customers.last_name')
            ->get();

            // dd('allLoans');

            return view('branch.show', compact('user', 'allLoans'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error fetching loan: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error fetching loan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
        }
    }



    /**
     * Processig the loan repayment
     */

     public function makeRepayment(Request $request, $loanId)
        {
            $business_id = Auth::user()->business_id;
            $loan = Loans::findOrFail($loanId);
            $amountPaid = $request->paid_amount;
            $user = Auth::user();
            $transaction_id = substr(Str::uuid()->toString(), 0, 15);
            // dd($request->method());

            $nextDue = LoanRepaymentSchedule::where('loan_id', $loanId)
                ->where('status', 'Pending')
                ->orderBy('due_date', 'asc')
                ->first();

            if (!$nextDue) {
                return redirect()->back->with('message', 'No pending repayments for this loan');
            }

            $remainingInterest = $nextDue->interest_amount;
            $remainingPrincipal = $nextDue->principal_amount;

            // Allocate payment to interest first, then to principal
            $interestPaid = min($amountPaid, $remainingInterest);
            $remainingAmount = $amountPaid - $interestPaid;

            // dd($remainingAmount);

            $principalPaid = min($remainingAmount, $remainingPrincipal);
            $totalPaid = $interestPaid + $principalPaid;

            // dd($totalPaid);

            // Save repayment
            LoanRepayment::create([
                'loan_id' => $loanId,
                'schedule_id' => $nextDue->id,
                'paid_amount' => $amountPaid,
                'total_paid' => $totalPaid,
                'interest_paid' => $interestPaid,
                'principal_paid' => $principalPaid,
                'paid_date' => now(),
                'payment_means' => $request->payment_means,
                'payment_reference' => $request->payment_reference,
                'collected_by' => $request->collected_by,
                'business_id' => $business_id,
                'branch_id' => $loan->branch_id,
                'customer_id' => $loan->customer_id,
                
            ]); 
            

            // Update total repayment in loan table
            $totalRepayment = LoanRepayment::where('loan_id', $loanId)->sum('paid_amount');
            $totalAmountDue = LoanRepaymentSchedule::where('loan_id', $loanId)
                                ->where('status', 'Pending')
                                ->sum(DB::raw('principal_amount + interest_amount'));
            $balance = $loan->loan_amount - $totalRepayment;

            $loan->total_paid = $totalRepayment;
            $loan->total_due = $totalAmountDue;
            $loan->balance = $balance;
            $loan->save();

            $nextDue->interest_amount -= $interestPaid;
            $nextDue->principal_amount -= $principalPaid;

            // Mark as Paid if fully settled
            if ($nextDue->interest_amount <= 0 && $nextDue->principal_amount <= 0) {
                $nextDue->status = 'Paid';
            }

            $nextDue->save();

            
            // Update schedule status
            // $nextDue->update(['status' => 'Paid']);

            // General Ledger Entry
            $account_number = $loan->customer_id; // Assuming customer ID is used as the account number

            // Calculate updated balance
            $balance_before = GeneralLedger::where('account_number', $account_number)->sum('debit') 
                            - GeneralLedger::where('account_number', $account_number)->sum('credit');

            $balance_after = $balance_before - $amountPaid;

            // Insert into General Ledger
            GeneralLedger::create([
                'account_number' => $account_number,
                'transaction_type' => 'Loan Repayment',
                'debit' => 0, // No debit since this is a repayment (money coming in)
                'credit' => $amountPaid, // Crediting the loan repayment
                'balance' => $balance_after, // Updated balance
                'transaction_date' => now(),
                'transaction_id' => $transaction_id,
                'description' => 'Loan Repayment',
                'reference' => $request->payment_reference, 
                'business_id' => $business_id,
                'branch_id' => $loan->branch_id,
                'created_by' => $user->id,
            ]);


            return redirect()->back()->with('message', 'Repayment recorded successfully');
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function getPendingRepayment2()
    // {
    //     $user = Auth::user();
    //     $business_id = Auth::user()->business_id;
    //     $pendingLoans = LoanRepaymentSchedule::where('status', 'Pending')
    //         ->where('business_id', $business_id)
    //         ->get();

    //         // dd($pendingLoans);
    //     return view ('loan.pending_loans_repayment', compact('pendingLoans', 'user'));
    // }

    public function getPendingRepayment()
{
    $user = Auth::user();
    $business_id = $user->business_id;

    $pendingLoans = LoanRepaymentSchedule::select(
            'loan_id',
            DB::raw('SUM(principal_amount) as total_principal'),
            DB::raw('SUM(interest_amount) as total_interest'),
            DB::raw('SUM(total_amount_due) as total_repayment')
        )
        ->where('status', 'Pending')
        ->where('business_id', $business_id)
        ->groupBy('loan_id')
        ->get();

        // dd($pendingLoans);

    return view('loan.pending_loans_repayment', compact('pendingLoans', 'user'));
}

    // get due loans within selected date range
    public function getDueLoans()
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $user = Auth::user();
        $business_id = Auth::user()->business_id;
        $dueLoans = LoanRepaymentSchedule::where('status', 'Pending')
            ->where('business_id', $business_id)
            ->whereBetween('due_date', [$startDate, $endDate])
            ->get();
            
        return view ('loan.due_loans', compact('dueLoans', 'user'));
    }

    // get due loan today
    public function getDueLoansToday()
    {
        $user = Auth::user();
        $business_id = Auth::user()->business_id;
        $dueLoans = LoanRepaymentSchedule::where('status', 'Pending')
            ->where('business_id', $business_id)
            ->whereDate('due_date', Carbon::today())
            ->get();
            // dd($dueLoans);
        return view ('loan.due_loans', compact('dueLoans', 'user'));
    }

    // get missed repayment
    public function getMissedRepayment()
    {
        $user = Auth::user();
        $business_id = Auth::user()->business_id;
        $missedRepayments = LoanRepaymentSchedule::where('status', 'Pending')
            ->where('business_id', $business_id)
            ->where('due_date', '<', Carbon::today())
            ->get();
        return view('loan.missed_repayments', compact('missedRepayments', 'user'));
    }

    // get loan repayment that has past maturity date. You are to get the maturity date from the loan schedule for the loan id
    public function getPastMaturity()
    {
        $user = Auth::user();
        $business_id = Auth::user()->business_id;
        $pastMaturityLoans = Loans::where('business_id', $business_id)
            ->where('maturity_date', '<', Carbon::today())
            ->get();
        return view('loan.past_maturity_loans', compact('pastMaturityLoans', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
