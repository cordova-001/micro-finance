<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Branch;
use App\Models\Customers;
use App\Models\LoanProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\LoanRepayment;
use App\Models\Loans;
use App\Models\SavingsProduct;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboardStats()
    {
        $business_id = Auth::user()->business_id;

        // dd($business_id);
        $all_customers = Customers::where('business_id', $business_id)->count();
        $totalSavings = Transaction::where('business_id', $business_id)->sum('amount_paid');
        // dd($totalSavings);
        $totalWithdrawal = Transaction::where('business_id', $business_id)->sum('amount_received');

        $totalBalance = $totalSavings - $totalWithdrawal;

        $totalPrincipalLoan = Loans::where('business_id', $business_id)->where('status', 'disbursed')->sum('loan_amount');
        $totalPendingLoan = Loans::where('business_id', $business_id)->where('status', 'pending')->sum('loan_amount');


        return view('dashboard', compact('all_customers', 'totalSavings', 'totalWithdrawal', 'totalBalance', 'totalPendingLoan', 'totalPrincipalLoan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
