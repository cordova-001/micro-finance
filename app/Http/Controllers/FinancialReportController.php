<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralLedger;
use App\Models\ChartOfAccounts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Generate General Ledger Report
     */
    public function generalLedger(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $ledgerEntries = GeneralLedger::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'asc')
            ->get();

        return view('reports.general_ledger', compact('ledgerEntries', 'startDate', 'endDate'));
    }

    /**
     * Generate Trial Balance Report
     */
    public function trialBalance(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $trialBalance = GeneralLedger::select('account_code', 'account_name', 
                DB::raw('SUM(debit) as total_debit'), 
                DB::raw('SUM(credit) as total_credit'))
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('account_code', 'account_name')
            ->get();

        return view('reports.trial_balance', compact('trialBalance', 'startDate', 'endDate'));
    }

    /**
     * Generate Balance Sheet Report
     */
    public function balanceSheet(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $assets = GeneralLedger::where('account_type', 'Asset')
            ->whereBetween('date', [$startDate, $endDate])
            ->select('account_name', DB::raw('SUM(debit) - SUM(credit) as balance'))
            ->groupBy('account_name')
            ->get();

        $liabilities = GeneralLedger::where('account_type', 'Liability')
            ->whereBetween('date', [$startDate, $endDate])
            ->select('account_name', DB::raw('SUM(credit) - SUM(debit) as balance'))
            ->groupBy('account_name')
            ->get();

        $equity = GeneralLedger::where('account_type', 'Equity')
            ->whereBetween('date', [$startDate, $endDate])
            ->select('account_name', DB::raw('SUM(credit) - SUM(debit) as balance'))
            ->groupBy('account_name')
            ->get();

        return view('reports.balance_sheet', compact('assets', 'liabilities', 'equity', 'startDate', 'endDate'));
    }

    /**
     * Generate Income Statement Report
     */
    public function incomeStatement(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $revenues = GeneralLedger::where('account_type', 'Revenue')
            ->whereBetween('date', [$startDate, $endDate])
            ->select('account_name', DB::raw('SUM(credit) - SUM(debit) as amount'))
            ->groupBy('account_name')
            ->get();

        $expenses = GeneralLedger::where('account_type', 'Expense')
            ->whereBetween('date', [$startDate, $endDate])
            ->select('account_name', DB::raw('SUM(debit) - SUM(credit) as amount'))
            ->groupBy('account_name')
            ->get();

        $totalRevenue = $revenues->sum('amount');
        $totalExpenses = $expenses->sum('amount');
        $netIncome = $totalRevenue - $totalExpenses;

        return view('reports.income_statement', compact('revenues', 'expenses', 'totalRevenue', 'totalExpenses', 'netIncome', 'startDate', 'endDate'));
    }
}
