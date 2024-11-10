<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Customers;
use App\Models\Branch;
use App\Models\SavingsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allCustomers()
    {
        $user = Auth::user();
        $branch = Branch::where('business_id', $user->business_id)->first();
        $customers = Customers::where('business_id', $user->business_id)->get();
        $sproducts = SavingsProduct::where('business_id', $user->business_id)->get();
        // dd($branch);
        return view('transactions.add_savings', compact('customers', 'user', 'sproducts', 'branch'));
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
        $business_id = Auth::user()->business_id;
        $acctNo = $request->input('account_number');
        $totalAmountReceived = Transaction::sum('amount_received');
        $totalAmountPaid = Transaction::sum('amount_paid');
        $balance = $totalAmountReceived - $totalAmountPaid;
        $transaction_id = substr(Str::uuid()->toString(), 0, 15);
        // $naration = 
        $transaction_type = 'Deposit';
        
        $request->validate([
            'account_number' => 'required',
            'deposit_amount' => 'required',
            'depositor_phone' => 'required|unique:customers|email',
            'branch' => 'required|unique:customers',
            'deposit_date' => 'required',
            'savings_product' => 'required',
        ]);

        $add_deposit = Transaction::create([
            'account_number' => $request->input('account_number'),
            'amount_paid' => $request->input('deposit_amount'),
            'depositor_phone' => $request->input('depositor_phone'),
            'branch' => $request->input('branch'),
            'deposit_date' => $request->input('deposit_date'),
            'savings_product' => $request->input('savings_product'),
            'business_id' => $business_id,
            'total_balance' => $balance,
            'transaction_id' => $transaction_id,
            'transaction_type' => $transaction_type
        ]);

        return redirect()->route('transactions.add_savings')->with('success', 'The Deposit has been created successfully');
    }

    public function confirmAccountForWithdrawal(Request $request)
    {
        $business_id = Auth::user()->business_id;
        $acctNo = $request->input('account_number');
        $checkAccountNo = Customers::where('business_id', $business_id)->where('customer_id', $acctNo)->first();
        if(empty($checkAccountNo))
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

    public function addWithdrawal(Request $request)
    {
        $business_id = Auth::user()->business_id;
        $acctNo = $request->input('account_number');
        $totalSavings = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_paid');
        $totalWithdrawal = Transaction::where('account_number', $checkAccountNo->customer_id)->sum('amount_received');
        $withdraw_amount = $request->input('withdraw_amount');
        $balance = $totalSavings - $totalWithdrawal;
        $currentBalance = $balance - $withdraw_amount;
        $transaction_id = substr(Str::uuid()->toString(), 0, 15);
        $withdraw_date = $request->input('withdraw_date');
        $withdrawn_by = $request->input('withdrawn_by');
        $staff = $request->input('staff');
        $transaction_type = 'Withdrawal';

        if($balance < $withdraw_amount){
            return "Insufficient Fund";
        }
        
        $request->validate([
            'account_number' => 'required',
            'deposit_amount' => 'required',
            'depositor_phone' => 'required|unique:customers|email',
            'branch' => 'required|unique:customers',
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
            'total_balance' => $balance,
            'transaction_id' => $transaction_id,
            'transaction_type' => $transaction_type,
            $staff = $staff,
        ]);

        return redirect()->back()->with('success', 'The withdrawal was successful');
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
