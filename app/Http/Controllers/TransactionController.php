<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Customers;
use App\Models\Branch;
use App\Models\SavingsProduct;
use Illuminate\Http\Request;
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
        return view('transactions.add_savings', compact('customers', 'user', 'sproducts', 'branches'));
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
        try{
            $user = Auth::user();
            $business_id = Auth::user()->business_id;
            $acctNo = $request->input('account_number');
            $totalAmountReceived = Transaction::sum('amount_received');
            $amount_paid = $request->input('deposit_amount');
            $totalAmountPaid = Transaction::sum('amount_paid');
            $customer = Customers::where('customer_id', $acctNo)->first(); // Fetch the customer record
            if (!$customer) {
                return back()->withErrors(['error' => 'Account number not found!']);
            }
            
            
            $transaction_type = 'Credit';
            $branch = $request->input('branch');

            $d_date = $request->input('deposit_date');

            $savings_product = $request->input('savings_product');
            $getSavingsProductDetails = SavingsProduct::where('product_name', $savings_product)->where('business_id', $business_id)->first();
            // dd($getSavingsProductDetails);
            // search from Transactions table to check if there is account opening fee to be deducted from this account 
            // $opening_fee_transaction = Transaction::where('account_number', $acctNo)
            //     ->where('transaction_type', 'Debit')
            //     ->where('narration', 'Maintenance fee')
            //     ->first();


            if($getSavingsProductDetails->opening_fee > 0)
            {
                // check from the transaction table if there has been any prior deduction for this savings product from this account owner. If no, deduct it from the first payment
                $check_maintenance_fee = Transaction::where('account_number', $acctNo)
                                        ->where('savings_product', $getSavingsProductDetails->product_name)
                                        ->where('opening_fee', $getSavingsProductDetails->opening_fee)
                                        ->where('business_id', $business_id)->count();

                // I want to get the number of count of this check_maintenance_fee 
                // dd($check_maintenance_fee);
                if($check_maintenance_fee < 1 )
                {
                    $opening_fee = $getSavingsProductDetails->opening_fee;
                    $amount_to_record = $amount_paid - $opening_fee;
                    $balance = $totalAmountPaid - $totalAmountReceived + $opening_fee; //  current balance when we sum the total amount paid minus total amount recieved plus maintenance fee
                    $balance_amount_to_record = $totalAmountPaid - $totalAmountReceived + $amount_to_record; // current balance when we sum the total amount paid minus total amount recieved plus the amount to record
                    $narration = 'Opening fee';
                    $transaction_type = 'Credit';
                    $transaction_id = substr(Str::uuid()->toString(), 0, 15);
                    $add_deposit = Transaction::create([
                        'account_number' => $request->input('account_number'),
                        'account_name' => $customer->first_name . ' ' . $customer->last_name, 
                        'amount_paid' => $opening_fee,
                        'depositor_phone' => $request->input('depositor_phone'),
                        'depositor_name' => $request->input('depositor_name'),
                        // 'deposit_date' => $request->input('deposit_date'),
                        'branch_id' => $request->input('branch'),
                        'transaction_date' => $request->input('deposit_date'),
                        'savings_product' => $request->input('savings_product'),
                        'business_id' => $business_id,
                        'total_balance' => $balance,
                        'transaction_id' => $transaction_id,
                        'transaction_type' => $transaction_type,
                        'narration' => $narration,
                        'staff' => $user->name,
                        
                    ]);
                    // I want to create a new transaction for the amount paid after deducting the opening fee
                    $transaction_id = substr(Str::uuid()->toString(), 0, 15);
                    $add_deposit = Transaction::create([
                        'account_number' => $request->input('account_number'),
                        'account_name' => $customer->first_name . ' ' . $customer->last_name, 
                        'amount_paid' => $amount_to_record,
                        'depositor_phone' => $request->input('depositor_phone'),
                        'depositor_name' => $request->input('depositor_name'),
                        'branch_id' => $request->input('branch'),
                        'transaction_date' => $request->input('deposit_date'),
                        'savings_product' => $request->input('savings_product'),
                        'business_id' => $business_id,
                        'total_balance' => $balance_amount_to_record,
                        'transaction_id' => $transaction_id,
                        'transaction_type' => $transaction_type,
                        'narration' => $request->input('narration'),
                        'staff' => $user->name,
                        
                    ]);

                    return redirect()->back()->with('success', 'The Deposit has been created successfully after deducting the opening fee');
                }

                $transaction_id = substr(Str::uuid()->toString(), 0, 15);
                $add_deposit = Transaction::create([
                    'account_number' => $request->input('account_number'),
                    'account_name' => $customer->first_name . ' ' . $customer->last_name, 
                    'amount_paid' => $request->input('deposit_amount'),
                    'depositor_phone' => $request->input('depositor_phone'),
                    'depositor_name' => $request->input('depositor_name'),
                    'branch_id' => $request->input('branch'),
                    'transaction_date' => $request->input('deposit_date'),
                    'savings_product' => $request->input('savings_product'),
                    'business_id' => $business_id,
                    'total_balance' => $balance,
                    'transaction_id' => $transaction_id,
                    'transaction_type' => $transaction_type,
                    'narration' => $request->input('narration'),
                    'staff' => $user->name,
                    
                ]);

                return redirect()->back()->with('success', 'The Deposit has been created successfully');
            
            }

            $balance = $totalAmountPaid - $totalAmountReceived + $amount_paid;
            $transaction_id = substr(Str::uuid()->toString(), 0, 15);

            // dd($getSavingsProductDetails);
            
            
                
                $request->validate([
                    'account_number' => 'required',
                    'deposit_amount' => 'required',                
                    'deposit_date' => 'required',
                    'savings_product' => 'required',
                ]);

                // if ($request->hasFile('file')) {
                //     $file = $request->file('file');
                //     $imageName1 = time() . '_file.' . $file->getClientOriginalExtension();
                //     $file->move(public_path('images'), $imageName1);
                //     $transaction->file = $imageName1;
                // }

                $add_deposit = Transaction::create([
                    'account_number' => $request->input('account_number'),
                    'account_name' => $customer->first_name . ' ' . $customer->last_name, 
                    'amount_paid' => $request->input('deposit_amount'),
                    'depositor_phone' => $request->input('depositor_phone'),
                    'depositor_name' => $request->input('depositor_name'),
                    'branch_id' => $request->input('branch'),
                    'transaction_date' => $request->input('deposit_date'),
                    'savings_product' => $request->input('savings_product'),
                    'business_id' => $business_id,
                    'total_balance' => $balance,
                    'transaction_id' => $transaction_id,
                    'transaction_means' => $request->input('transaction_means'),
                    // 'file' => $imageName1,
                    'transaction_type' => $transaction_type,
                    'narration' => $request->input('narration'),
                    'staff' => $user->name,
                   
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
        return view('transactions.add_withdrawal' );
    }


    public function confirmAccountForWithdrawal(Request $request)
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
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_paid');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_received');
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
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_paid');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_received');
        $withdraw_amount = $request->input('withdraw_amount');
        $balance = $totalSavings - $totalWithdrawal;
        $currentBalance = $balance - $withdraw_amount;
        $transaction_id = substr(Str::uuid()->toString(), 0, 15);
        $withdraw_date = $request->input('withdraw_date');
        $withdrawn_by = $request->input('withdrawn_by');
        $staff = $request->input('staff');
        $transaction_type = 'Debit';

        if($balance < $withdraw_amount){
            return redirect()->back()->with('error', 'Insufficient fund')->withInput();            
        }
        
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
            'amount_received' => $withdraw_amount,
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
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_paid');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_received');
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
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_paid');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_received');
        $transfer_amount = $request->input('transfer_amount');
        $balance = $totalSavings - $totalWithdrawal;
        $currentBalance = $balance - $transfer_amount;                 // this is the balance for the paying account

        $destination_amount_received = $checkDestinationAccountNo->sum('amount_received');
        $destination_amount_paid = $checkDestinationAccountNo->sum('amount_paid');
        $destination_balance = ($destination_amount_received - $destination_amount_paid) + $transfer_amount;
        
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
            'amount_received' => $withdraw_amount,
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
