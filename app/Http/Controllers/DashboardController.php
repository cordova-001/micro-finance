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
use App\Models\LoanRepaymentSchedule;
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
        // get all custmers registered this year
        $all_customers_this_year = Customers::where('business_id', $business_id)->whereYear('created_at', date('Y'))->count();
        // get all custmers registered this month
        $all_customers_this_month = Customers::where('business_id', $business_id)->whereMonth('created_at', date('m'))->count();      
        $totalSavings = Transaction::where('business_id', $business_id)->sum('amount_paid');
        // dd($totalSavings);
        $totalWithdrawal = Transaction::where('business_id', $business_id)->sum('amount_received');

        $totalBalance = $totalSavings - $totalWithdrawal;

        $totalPrincipalLoan = Loans::where('business_id', $business_id)->where('status', 'open')->sum('loan_amount');
        // get total loan principal for this year
        $totalPrincipalLoanThisYear = Loans::where('business_id', $business_id)->where('status', 'open')->whereYear('created_at', date('Y'))->sum('loan_amount');
        // get total loan principal for this month
        $totalPrincipalLoanThisMonth = Loans::where('business_id', $business_id)->where('status', 'open')->whereMonth('created_at', date('m'))->sum('loan_amount');

        $totalPendingLoan = Loans::where('business_id', $business_id)->where('status', 'pending')->sum('loan_amount');

        $fullyPaidLoan = Loans::where('business_id', $business_id)->where('status', 'closed')->sum('loan_amount');
        $fullyPaidLoanThisYear = Loans::where('business_id', $business_id)->where('status', 'closed')->whereYear('created_at', date('Y'))->sum('loan_amount');
        $fullyPaidLoanThisMonth = Loans::where('business_id', $business_id)->where('status', 'closed')->whereMonth('created_at', date('m'))->sum('loan_amount');

        $getLoanRepayment = LoanRepayment::where('business_id', $business_id)->sum('paid_amount');
        $getLoanRepaymentThisYear = LoanRepayment::where('business_id', $business_id)->whereYear('created_at', date('Y'))->sum('paid_amount');
        $getLoanRepaymentThisMonth = LoanRepayment::where('business_id', $business_id)->whereMonth('created_at', date('m'))->sum('paid_amount');
        
        // check from repayment schedules to get principal amount that at not paid
        $getOpenPrincipalRepayment = LoanRepaymentSchedule::where('business_id', $business_id)->where('status', 'pending')->sum('principal_amount');
        $getOpenInterestRepayment = LoanRepaymentSchedule::where('business_id', $business_id)->where('status', 'pending')->sum('interest_amount');


        return view('dashboard', compact('all_customers', 'totalSavings', 'totalWithdrawal', 'fullyPaidLoan', 'fullyPaidLoanThisMonth',
                         'fullyPaidLoanThisYear', 'getLoanRepayment', 'getLoanRepaymentThisMonth', 'getLoanRepaymentThisYear', 'totalBalance', 
                         'totalPendingLoan', 'totalPrincipalLoanThisMonth', 'getOpenInterestRepayment', 'getOpenPrincipalRepayment', 'totalPrincipalLoanThisYear', 'totalPrincipalLoan', 'all_customers_this_year', 'all_customers_this_month'));
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
