<?php

namespace App\Http\Controllers;

use App\Models\AccountSystem;
use Illuminate\Http\Request;
use App\Models\GeneralLedger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountSystemController extends Controller
{


    public function viewGeneralLedger()
    {
        $business_id = Auth::user()->business_id;
        $general_ledger = GeneralLedger::where('business_id', $business_id)->get();
        return view('account.general_ledger', compact('business_id', 'general_ledger'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allExpenses()
    {
        $business_id = Auth::user()->business_id;
        $all_expenses = AccountSystem::where('business_id', $business_id)->where('account_type', "Expenses")->get();
        return view('account.all_expenses', compact('business_id', 'all_expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createExpenses()
    {
        return view('account.add_expenses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newExpenses(Request $request)
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


    // Cashflow Statement

    public function cashFlowStatement(Request $request)
{
    $startDate = $request->start_date ?? now()->startOfMonth();
    $endDate = $request->end_date ?? now()->endOfMonth();

    // Cash Inflows (from loan repayments, deposits, etc.)
    $cashInflows = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
        ->whereIn('transaction_type', ['Operating', 'Investing', 'Financing'])
        ->sum('credit'); // Cash received

    // Cash Outflows (loan disbursements, withdrawals, etc.)
    $cashOutflows = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
        ->whereIn('transaction_type', ['Operating', 'Investing', 'Financing'])
        ->sum('debit'); // Cash spent

    // Net Cash Flow
    $netCashFlow = $cashInflows - $cashOutflows;

    return view('reports.cashflow', compact('cashInflows', 'cashOutflows', 'netCashFlow', 'startDate', 'endDate'));
}



    public function cashFlowStatements(Request $request)
    {
        $startDate = $request->start_date ?? now()->startOfMonth();
        $endDate = $request->end_date ?? now()->endOfMonth();

        // Receipts (Cash Inflows)
        $loanPrincipalRepayments = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('transaction_type', 'Loan Principal Repayment')
            ->sum('credit');

        $loanInterestRepayments = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('transaction_type', 'Loan Interest Repayment')
            ->sum('credit');

        $savingsDeposits = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('transaction_type', 'Savings Deposit')
            ->sum('credit');

        $totalReceipts = $loanPrincipalRepayments + $loanInterestRepayments + $savingsDeposits;

        // Payments (Cash Outflows)
        $loansReleased = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('transaction_type', 'Loan Disbursement')
            ->sum('debit');

        $expenses = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('transaction_type', 'Expenses')
            ->sum('debit');

        $savingsInterest = GeneralLedger::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('transaction_type', 'Savings Interest')
            ->sum('debit');

        $totalPayments = $loansReleased + $expenses + $savingsInterest;

        // Calculate Net Cash Flow
        $netCashFlow = $totalReceipts - $totalPayments;

        // Get Previous Balance (e.g., Last Month)
        $previousBalance = 0; // You may fetch this from a balance sheet table

        // Calculate Total Balance
        $totalBalance = $previousBalance + $netCashFlow;

        return view('reports.cashflow', compact(
            'loanPrincipalRepayments',
            'loanInterestRepayments',
            'savingsDeposits',
            'totalReceipts',
            'loansReleased',
            'expenses',
            'savingsInterest',
            'totalPayments',
            'netCashFlow',
            'previousBalance',
            'totalBalance',
            'startDate',
            'endDate'
        ));
    }

}
