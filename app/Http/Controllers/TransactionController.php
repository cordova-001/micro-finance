<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Customers;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use App\Models\SavingsProduct;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use App\Models\GeneralLedger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newDeposit()
    {
        $user = Auth::user();
        $branches = Branch::where('business_id', $user->business_id)->get();
        $customers = Customers::where('business_id', $user->business_id)->get();
        $sproducts = SavingsProduct::where('business_id', $user->business_id)->get();
        $bank_accounts = BankAccount::where('business_id', $user->business_id)->get();        
        return view('transactions.add_savings', compact('customers', 'user', 'sproducts', 'branches', 'bank_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function addDeposit(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'deposit_amount' => 'required|numeric|min:0',                 
            'deposit_date' => 'required',
            'savings_product' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

        ]); 

            $user = Auth::user();
            $business_id = $user->business_id;
        
            // Fetch customer details
            $acctNo = $request->account_number;
            $customer = Customers::where('customer_id', $acctNo)->first();
            if (!$customer) {
                return back()->withErrors(['error' => 'Customer not found!']);
            }   
            
            $productName = $request->savings_product;
            $amountReceived = $request->deposit_amount;
            $savings_product = $request->savings_product;
            $d_date = $request->deposit_date;

            $totalAmountReceived = Transaction::where('business_id', $business_id)->sum('inflow_amount');
            $inflow_amount = $request->input('deposit_amount');
            $totalAmountPaid = Transaction::where('business_id', $business_id)->sum('outflow_amount');
            $balance = $totalAmountPaid - $totalAmountReceived + $inflow_amount;
            
            $transaction_type = 'Credit';
            $branch = $request->input('branch');
            
            
            // Fetch savings product details
            $savingsProduct = SavingsProduct::where('product_name', $savings_product)->where('business_id', $business_id)->first();
            if (!$savingsProduct) {
                return back()->withErrors(['error' => 'Savings product not found!']);
            }

            
            // Check if opening fee is applicable
            $openingFee = $savingsProduct->opening_fee ?? 0;
            
            // Check if opening fee is applicable
            $openingFeeApplicable = $openingFee > 0;

            // If opening fee exists, check if it has already been deducted
            $feeAlreadyDeducted = $openingFeeApplicable
            ? Transaction::where('account_number', $acctNo)
                ->where('business_id', $business_id) // Ensure it's within the same business
                ->where('narration', 'Opening Fee')
                ->exists()
            : true;

             // Calculate existing balance for the account
            $totalAmountReceived = Transaction::where('account_number', $acctNo)
                ->where('business_id', $business_id)
                ->sum('inflow_amount');

            $totalAmountPaid = Transaction::where('account_number', $acctNo)
                ->where('business_id', $business_id)
                ->sum('outflow_amount');

            $currentBalance = $totalAmountReceived - $totalAmountPaid ;
            $transaction_id = substr(Str::uuid()->toString(), 0, 15);

             // Handle file upload
            // $uploadedFileName = null;
            // if ($request->hasFile('file')) {
            //     $uploadedFileName = $this->uploadFile($request->file('file'));
            // }

            $imageName1 = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imageName1 = time() . 'file.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $imageName1);
                // $customer->file = $imageName1;
            }

            // dd($request->all());
            // dd($imageName1);
               // Begin Database Transaction
        DB::beginTransaction();            
        try{  

            if ($amountReceived > 0) {
                Transaction::create([
                    'account_name' => $customer->first_name . ' ' . $customer->last_name,
                    'account_number' => $acctNo,
                    'business_id' => $business_id,
                    'narration' => 'Deposit',
                    'outflow_amount' => 0,
                    'inflow_amount' => $amountReceived,
                    'total_balance' => $currentBalance + $amountReceived,
                    'depositor_phone' => $request->input('depositor_phone'),
                    'depositor_name' => $request->input('depositor_name'),
                    'branch_id' => $branch,
                    'transaction_date' => $d_date,
                    'savings_product' => $savings_product,
                    'transaction_id' => $transaction_id,
                    'transaction_means' => $request->input('transactions_means'),
                    'transaction_type' => $transaction_type,
                    'staff' => $user->name,
                    'file' => $imageName1,
                ]);
               
            }   
        
            $currentBalance += $amountReceived;
    
            if ($openingFeeApplicable && !$feeAlreadyDeducted) {
                // Deduct opening fee (Transaction 1)
                Transaction::create([                    
                    'account_name' => $customer->first_name . ' ' . $customer->last_name,
                    'account_number' => $acctNo,
                    'business_id' => $business_id,
                    'narration' => 'Opening Fee',
                    'outflow_amount' => $openingFee,
                    'inflow_amount' => 0,
                    'total_balance' => $currentBalance - $openingFee,
                    'depositor_phone' => $request->input('depositor_phone'),
                    'depositor_name' => $request->input('depositor_name'),
                    'branch_id' => $branch,
                    'transaction_date' => $d_date,
                    'savings_product' => $savings_product,
                    'transaction_id' => $transaction_id,
                    'transaction_means' => $request->input('transactions_means'),
                    'transaction_type' => 'Debit',
                    'staff' => $user->name,
                    'file' => $imageName1,
                ]);

                $currentBalance -= $openingFee;
    
                
            }       


            $transaction_id = substr(Str::uuid()->toString(), 0, 15);

            $cashAmount = Chart::where('account_name', 'Cash')->value('account_number');
            $savingsDeposit = Chart::where('account_name', 'Customer Savings Deposit')->value('account_number'); 
            $openingFeeAccount = Chart::where('account_name', 'Opening Fee Account')->value('account_number');

            $cashPreviousBalance = GeneralLedger::where('account_number', $cashAmount)->sum('debit') 
                - GeneralLedger::where('account_number', $cashAmount)->sum('credit');

            $customerPreviousBalance = GeneralLedger::where('account_number', $savingsDeposit)->sum('debit') 
                - GeneralLedger::where('account_number', $savingsDeposit)->sum('credit');
            

                if ($amountReceived > 0) {
                    // General Ledger Entry - Debit Cash Account (Customer Deposited Cash)
                    GeneralLedger::create([
                        'business_id' => $business_id,
                        'branch_id' => $branch,
                        'transaction_id' => $transaction_id,
                        'transaction_type' => 'Customer Savings Deposit',
                        'account_name' => 'Cash',
                        'account_number' => $cashAmount,
                        'debit' => $amountReceived,
                        'credit' => 0,
                        'balance' => $cashPreviousBalance + $amountReceived, // Increase in cash balance
                        'transaction_date' => now(),
                        'description' => 'Cash deposit received from customer',
                        'created_by' => $user->name,
                    ]);
                
                    // General Ledger Entry - Credit Customer Savings Account
                    GeneralLedger::create([
                        'business_id' => $business_id,
                        'branch_id' => $branch,
                        'transaction_id' => $transaction_id,
                        'transaction_type' => 'Customer Savings Deposit',
                        'account_name' => 'Customer Savings Deposit',
                        'account_number' => $savingsDeposit,
                        'debit' => 0,
                        'credit' => $amountReceived,
                        'balance' => $customerPreviousBalance + $amountReceived, // Increase in savings deposit
                        'transaction_date' => now(),
                        'description' => 'Customer savings deposit credited',
                        'created_by' => $user->name,
                    ]);
                
                    // Journal Entry - Credit Cash Account
                    JournalEntry::create([
                        'business_id' => $business_id,
                        'branch_id' => $branch,
                        'transaction_id' => $transaction_id,
                        'transaction_type' => 'Customer Savings Deposit',
                        'account_name' => 'Cash',
                        'account_number' => $cashAmount,
                        'balance' => $cashPreviousBalance + $amountReceived,
                        'debit' => 0,
                        'credit' => $amountReceived,
                        'transaction_date' => now(),
                        'description' => 'Credit Cash Account for customer deposit',
                        'created_by' => $user->name,
                    ]);
                
                    // Journal Entry - Debit Customer Savings Account
                    JournalEntry::create([
                        'business_id' => $business_id,
                        'branch_id' => $branch,
                        'transaction_id' => $transaction_id,
                        'transaction_type' => 'Customer Savings Deposit',
                        'account_name' => 'Customer Savings Deposit',
                        'account_number' => $savingsDeposit,
                        'debit' => $amountReceived,
                        'credit' => 0,
                        'balance' => $customerPreviousBalance + $amountReceived,
                        'transaction_date' => now(),
                        'description' => 'Debit Customer Savings Deposit for deposit transaction',
                        'created_by' => $user->name,
                    ]);
                }


            if ($openingFeeApplicable && !$feeAlreadyDeducted) {
                $feeTransactionId = substr(Str::uuid()->toString(), 0, 15);
            
                // General Ledger - Opening Fee Deduction
                GeneralLedger::create([
                    'business_id' => $business_id,
                    'branch_id' => $branch,
                    'transaction_id' => $feeTransactionId,
                    'transaction_type' => 'Opening Fee',
                    'account_name' => 'Opening Fee Income',
                    'account_number' => $openingFeeAccount,
                    'debit' => 0,
                    'credit' => $openingFee,
                    'balance' => $customerPreviousBalance - $openingFee,
                    'transaction_date' => now(),
                    'description' => 'Opening Fee charged on account',
                    'created_by' => $user->name,
                ]);
            
                // Journal Entry - Debit Customer Account for Opening Fee
                JournalEntry::create([
                    'business_id' => $business_id,
                    'branch_id' => $branch,
                    'transaction_id' => $feeTransactionId,
                    'transaction_type' => 'Opening Fee',
                    'account_name' => 'customer Savings Deposit',
                    'account_number' => $savingsDeposit,
                    'debit' => $openingFee,
                    'credit' => 0,
                    'balance' => $currentBalance - $openingFee,
                    'transaction_date' => now(),
                    'description' => 'Opening Fee deducted from customer account',
                    'created_by' => $user->name,
                ]);
            }

                  
            Log::info("Current Balance Before Deposit: " . $currentBalance);
            Log::info("Deposit Amount: " . $amountReceived);
            Log::info("Balance After Deposit: " . ($currentBalance + $amountReceived));

            
             // Commit transaction
             DB::commit();                                                 
             return redirect()->back()->with('success', 'The transactions was successfully recorded');
            }catch (\Illuminate\Validation\ValidationException $e) {
                DB::rollBack();
                // Log validation errors
                Log::error('Validation errors:', $e->errors());
                return back()->withErrors($e->errors());  // Display errors back to the user
            }
    }

    
    public function addDeposit2(Request $request)
    {
        try{
            $user = Auth::user();
            $business_id = Auth::user()->business_id;
            $acctNo = $request->input('account_number');
            $totalAmountReceived = Transaction::sum('outflow_amount');
            $inflow_amount = $request->input('deposit_amount');
            $inflow_amount = (float) $inflow_amount;
            $totalAmountPaid = Transaction::sum('inflow_amount');
            $customer = Customers::where('customer_id', $acctNo)->first(); // Fetch the customer record
            if (!$customer) {
                return back()->withErrors(['error' => 'Account number not found!']);
            }
            
            
            $transaction_type = 'Credit';
            $branch = $request->input('branch');

            $d_date = $request->input('deposit_date');

            $savings_product = $request->input('savings_product');
            $getSavingsProductDetails = SavingsProduct::where('product_name', $savings_product)->where('business_id', $business_id)->first();
            

            $balance = $totalAmountPaid - $totalAmountReceived + $inflow_amount;
            $transaction_id = substr(Str::uuid()->toString(), 0, 15);

            // dd($getSavingsProductDetails);
            
            
                
                $request->validate([
                    'account_number' => 'required',
                    'deposit_amount' => 'required',                
                    'deposit_date' => 'required',
                    'savings_product' => 'required',
                ]);


                $transaction = new Transaction();
                $transaction->account_number = $request->input('account_number');
                $transaction->account_name = $customer->first_name . ' ' . $customer->last_name;
                $transaction->inflow_amount = $request->input('deposit_amount');
                $transaction->depositor_phone = $request->input('depositor_phone');
                $transaction->depositor_name = $request->input('depositor_name');
                $transaction->branch_id = $request->input('branch');
                $transaction->transaction_date = $request->input('deposit_date');
                $transaction->savings_product = $request->input('savings_product');
                $transaction->business_id = $business_id;
                $transaction->total_balance = $balance;
                $transaction->transaction_id = $transaction_id;
                $transaction->transaction_means = $request->input('transactions_means');
                $transaction->transaction_type = $transaction_type;
                $transaction->narration = $request->input('narration');
                $transaction->staff = $user->name;

                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $imageName1 = time() . '_file.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images'), $imageName1);
                    $transaction->file = $imageName1;
                }



                $transaction->save();

                GeneralLedger::create([
                    'business_id' => $business_id,
                    'branch_id' => $branch,
                    'transaction_id' => $transaction_id,
                    'transaction_type' => 'Customer Deposit',
                    'account_name' => 'Cash',
                    'account_number' => '100', // Assume this is the cash account number
                    'debit' => $inflow_amount,
                    'credit' => 0,
                    'balance' => GeneralLedger::where('account_number', '100')->sum('debit') - 
                                 GeneralLedger::where('account_number', '100')->sum('credit') + $inflow_amount,
                    'transaction_date' => $d_date,
                    'desription' => 'Customer deposit received',
                    'created_by' => $user->name,
                ]);
        
                // ✅ 2. Credit Customer Savings Account (Liability)
                GeneralLedger::create([
                    'business_id' => $business_id,
                    'branch_id' => $branch,
                    'transaction_id' => $transaction_id,
                    'transaction_type' => 'Customer Deposit',
                    'account_name' => 'Customer Savings Account',
                    'account_number' => $acctNo, // Customer’s account number
                    'debit' => 0,
                    'credit' => $inflow_amount,
                    'balance' => GeneralLedger::where('account_number', $acctNo)->sum('debit') - 
                                 GeneralLedger::where('account_number', $acctNo)->sum('credit') - $inflow_amount,
                    'transaction_date' => $d_date,
                    'description' => 'Deposit into savings account',
                    'created_by' => $user->name,
                ]);
        

                return redirect()->back()->with('success', 'TThe deposit has been credited successfully');
                

                    
            }catch (\Illuminate\Validation\ValidationException $e) {
                // Log validation errors
                Log::error('Validation errors:', $e->errors());
                return back()->withErrors($e->errors());  // Display errors back to the user
            }
    }

    public function manageDeposit()
    {
        $business_id = Auth::user()->business_id;
        $transaction = Transaction::where('business_id', $business_id)->where('transaction_type', 'Credit')->get();
        // dd($transaction);
        return view ('transactions.manage_savings', compact('transaction'));
    }



    public function newWithdrawal()
    {
        $user = Auth::user();
        $business_id = $user->business_id;
        $getAccountDetails = Customers::where('business_id', $business_id)->get();
        $branch = Branch::where('business_id', $business_id)->get();
        return view('transactions.add_withdrawal', compact('business_id', 'getAccountDetails', 'branch'));
    }


    public function confirmAccountForWithdrawal(Request $request)
    {
        $business_id = Auth::user()->business_id;
        $acctNo = $request->input('account_number');
        $checkAccountNo = Customers::where('business_id', $business_id)->where('customer_id', $acctNo)->first();
        // dd($checkAccountNo);
        if(empty($acctNo))
        {
            // return "A valid Account number is required";
            return redirect()->back()->with('error', 'A valid account number is required');
        }
        if($checkAccountNo->count() < 1)
        {
            // return "Invalid Account Number";
            return redirect()->back()->with('error', 'Invalid Account Number');
        }
        $chkAcctDetail = Transaction::where('account_number', $checkAccountNo->customer_id)->first(); //this is to get the details of account transactions
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('inflow_amount');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('outflow_amount');
        $totalBalance = $totalSavings - $totalWithdrawal;
        return view('transactions.create_withdrawal', compact('checkAccountNo', 'chkAcctDetail', 'business_id', 'totalSavings', 'totalWithdrawal', 'totalBalance'));
        
    }

    public function manageWithdrawal()
    {
        $business_id = Auth::user()->business_id;
        $transaction = Transaction::where('business_id', $business_id)->where('transaction_type', 'Debit')->get();
        // dd($transaction);
        return view ('transactions.manage_withdrawal', compact('transaction'));
    }

    public function addWithdrawal(Request $request)
    {
        $business_id = Auth::user()->business_id;
        $acctNo = $request->input('account_number');
        $checkAccountNo = Customers::where('business_id', $business_id)->where('customer_id', $acctNo)->first();
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('inflow_amount');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('outflow_amount');
        $withdraw_amount = $request->input('withdraw_amount');
        $balance = $totalSavings - $totalWithdrawal;
        $currentBalance = $balance - $withdraw_amount;
        $transaction_id = substr(Str::uuid()->toString(), 0, 15);
        $withdrawal_date = $request->input('withdrawal_date');
        $withdrawn_by = $request->input('withdrawn_by');
        $branch_id = $request->input('branch_id');
        $staff = $request->input('staff');
        $transaction_type = 'Debit';

        if(!$checkAccountNo)
        {
            return redirect()->back()->with('error', 'Invalid Account Number');
        }

        if($balance < $withdraw_amount){
            return redirect()->back()->with('error', 'Insufficient fund')->withInput();            
        }
        
        $request->validate([
            'account_number' => 'required',            
            'branch_id' => 'required',
            // 'deposit_date' => 'required',
        ]);

        $add_withdrawal = Transaction::create([
            'account_name' => $checkAccountNo->first_name . ' ' . $checkAccountNo->last_name,
            'account_number' => $request->input('account_number'),
            'outflow_amount' => $withdraw_amount,
            'withdrawn_by' => $withdrawn_by,
            'branch_id' => $request->input('branch_id'),
            'transaction_date' => $request->input('withdrawal_date'),
            'business_id' => $business_id,
            'total_balance' => $currentBalance,
            'transaction_id' => $transaction_id,
            'transaction_type' => $transaction_type,
            'narration' => 'Withdrawal',
            'staff' => $staff,
        ]);

        return redirect()->back()->with('success', 'The withdrawal was successful');
    }

    public function newTransfer()
    {
        $user = Auth::user();
        return view('transactions.start_transfer' );
    }

    public function confirmAccountForTransfer(Request $request)
    {
        $business_id = Auth::user()->business_id;
        $acctNo = $request->input('account_number');
        $checkAccountNo = Customers::where('business_id', $business_id)->where('customer_id', $acctNo)->first();
        // dd($checkAccountNo);
        if(empty($acctNo))
        {
            return "A valid Account number is required";
        }
        if($checkAccountNo->count() < 1)
        {
            return "Invalid Account Number";
        }
        $chkAcctDetail = Transaction::where('account_number', $checkAccountNo->customer_id)->first(); //this is to get the details of account transactions
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('inflow_amount');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('outflow_amount');
        $totalBalance = $totalSavings - $totalWithdrawal;
        return view('transactions.intra_bank_transfer', compact('checkAccountNo', 'chkAcctDetail', 'business_id', 'totalSavings', 'totalWithdrawal', 'totalBalance'));        
    }

    public function addTransfer(Request $request)
    {
        /**
         * Validate the source account number and  destination account number
         * Validate the account balance and check with transfer amount
         * Deduct from the source account and credt the destination account
         */
        $business_id = Auth::user()->business_id;
        $account_number = $request->input('account_number');
        $account_name = $request->input('account_name');
        $destination_account = $request->input('destination_account');
        
        $transfer_date = $request->input('transfer_date');
        $branch_id = $request->input('branch_id');

        // * Validate the source account number and  destination account number
        $checkAccountNo = Customers::where('business_id', $business_id)->where('customer_id', $account_number)->first();
        if($checkAccountNo->ount() < 1)
        {
            return 'Invalid Account Number';
        }

        $checkDestinationAccountNo = Customers::where('customer_id', $destination_account)->first();
        if($checkDestinationAccountNo->ount() < 1)
        {
            return 'The destination Account Number does not exist';
        }
        

        // * Validate the account balance and check with transfer amount        
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('inflow_amount');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('outflow_amount');
        $transfer_amount = $request->input('transfer_amount');
        $balance = $totalSavings - $totalWithdrawal;
        $currentBalance = $balance - $transfer_amount;                 // this is the balance for the paying account

        $destination_outflow_amount = $checkDestinationAccountNo->sum('outflow_amount');
        $destination_inflow_amount = $checkDestinationAccountNo->sum('inflow_amount');
        $destination_balance = ($destination_outflow_amount - $destination_inflow_amount) + $transfer_amount;
        
        $transaction_id = substr(Str::uuid()->toString(), 0, 15);
        $withdraw_date = $request->input('withdraw_date');
        $withdrawn_by = $request->input('withdrawn_by');
        $staff = $request->input('staff');
        $transaction_type = 'Withdrawal';

        // if($balance < $withdraw_amount){
        //     return "Insufficient Fund";
        // }
        
        $request->validate([
            'account_number' => 'required',
            'deposit_amount' => 'required',
            'depositor_phone' => 'nullable',
            'branch_id' => 'required',
            'deposit_date' => 'required',
            'savings_product' => 'required',
        ]);

        $add_withdrawal = Transaction::create([
            'account_number' => $request->input('account_number'),
            'outflow_amount' => $withdraw_amount,
            'withdrawn_by' => $withdrawn_by,
            'branch' => $request->input('branch'),
            'withdraw_date' => $request->input('withdraw_date'),
            'business_id' => $business_id,
            'total_balance' => $currentBalance,
            'transaction_id' => $transaction_id,
            'transaction_type' => $transaction_type,
            'staff' => $staff,
        ]);

        return redirect()->back()->with('success', 'The withdrawal was successful');

        session()->flash('success', 'Thanks for filling. Your form submitted successfully!');

        return redirect()->back();
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
