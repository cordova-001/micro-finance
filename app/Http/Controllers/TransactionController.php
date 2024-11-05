<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Customers;
use App\Models\Branch;
use App\Models\SavingsProduct;
use Illuminate\Http\Request;

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
            'deposit_amount' => $request->input('deposit_amount'),
            'depositor_phone' => $request->input('depositor_phone'),
            'branch' => $request->input('branch'),
            'deposit_date' => $request->input('deposit_date'),
            'savings_product' => $request->input('savings_product'),
            'business_id' => $business_id,
            'total_balance' => $balance,
        ]);

        return redirect()->route('branch.index')->with('success', 'The branch has been created successfully');
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
