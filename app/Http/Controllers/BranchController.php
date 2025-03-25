<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\LoanRepayment;
use App\Models\Loans;
use App\Models\Transaction;
// use App\Models\LoanRepayment;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $branch = Branch::all();
        $business_id = Auth::user()->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        return view('branch.index', compact('branch'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $business_id = Auth::user()->business_id;
        // dd($business_id);
        $branch = Branch::create([
        'branch_name' => $request->input('branch_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'branch_no' => $request->input('branch_no'),
        'business_id' => $business_id,
        'manager' => $request->input('manager'), 
        ]);

        return redirect()->route('branch.index')->with('success', 'The branch has been created successfully');
        // return redirect()->route('get-property')->with('Success', 'The branh was added successfully');
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $business_id = Auth::user()->business_id;
            $branch = Branch::where('id', $id)
                        ->where('business_id', $business_id)
                        ->firstOrFail();

                        // Fetch Loans for this branch
            $loans = DB::table('loans')
                        ->where('branch_id', $id)
                        ->where('business_id', $business_id)
                        ->get();

        // Fetch Investments for this branch
            $repayments = DB::table('loan_repayments')
                        ->where('branch_id', $id)
                        ->where('business_id', $business_id)
                        ->get();

            $transactions = DB::table('transactions')
                        ->where('branch_id', $id)
                        ->where('business_id', $business_id)
                        // ->where('transaction_type', 'savings') 
                        ->get();

            $all_customers = Customers::where('business_id', $business_id)->where('branch_id', $id)->count();
            // get all custmers registered this year
            $all_customers_this_year = Customers::where('business_id', $business_id)->where('branch_id', $id)->whereYear('created_at', date('Y'))->count();
            // get all custmers registered this month
            $all_customers_this_month = Customers::where('business_id', $business_id)->where('branch_id', $id)->whereMonth('created_at', date('m'))->count();      
            $totalSavings = Transaction::where('business_id', $business_id)->where('branch_id', $id)->sum('amount_paid');
            // dd($totalSavings);
            $totalWithdrawal = Transaction::where('business_id', $business_id)->where('branch_id', $id)->sum('amount_received');
    
            $totalBalance = $totalSavings - $totalWithdrawal;
    
            $totalPrincipalLoan = Loans::where('business_id', $business_id)->where('branch_id', $id)->where('status', 'open')->sum('loan_amount');
            // get total loan principal for this year
            $totalPrincipalLoanThisYear = Loans::where('business_id', $business_id)->where('branch_id', $id)->where('status', 'open')->whereYear('created_at', date('Y'))->sum('loan_amount');
            // get total loan principal for this month
            $totalPrincipalLoanThisMonth = Loans::where('business_id', $business_id)->where('branch_id', $id)->where('status', 'open')->whereMonth('created_at', date('m'))->sum('loan_amount');
    
            $totalPendingLoan = Loans::where('business_id', $business_id)->where('branch_id', $id)->where('status', 'pending')->sum('loan_amount');
    
            $fullyPaidLoan = Loans::where('business_id', $business_id)->where('branch_id', $id)->where('status', 'closed')->sum('loan_amount');
            $fullyPaidLoanThisYear = Loans::where('business_id', $business_id)->where('branch_id', $id)->where('status', 'closed')->whereYear('created_at', date('Y'))->sum('loan_amount');
            $fullyPaidLoanThisMonth = Loans::where('business_id', $business_id)->where('branch_id', $id)->where('status', 'closed')->whereMonth('created_at', date('m'))->sum('loan_amount');
    
            $getLoanRepayment = LoanRepayment::where('business_id', $business_id)->where('branch_id', $id)->sum('paid_amount');
            $getLoanRepaymentThisYear = LoanRepayment::where('business_id', $business_id)->where('branch_id', $id)->whereYear('created_at', date('Y'))->sum('paid_amount');
            $getLoanRepaymentThisMonth = LoanRepayment::where('business_id', $business_id)->where('branch_id', $id)->whereMonth('created_at', date('m'))->sum('paid_amount');
                        
            
            return view('branch.show', compact('branch', 'loans', 'repayments', 'transactions', 'all_customers', 'totalSavings', 'totalWithdrawal', 'fullyPaidLoan', 'fullyPaidLoanThisMonth',
                         'fullyPaidLoanThisYear', 'getLoanRepayment', 'getLoanRepaymentThisMonth', 'getLoanRepaymentThisYear', 'totalBalance', 
                         'totalPendingLoan', 'totalPrincipalLoanThisMonth', 'totalPrincipalLoanThisYear', 'totalPrincipalLoan', 'all_customers_this_year', 'all_customers_this_month'));
        
        } catch (\Exception $e) {
            \Log::error('Error fetching branch data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while retrieving branch details.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business_id = Auth::user()->business_id;
        $branch = Branch::where('id', $id)->where('business_id', $business_id)->firstOrFail();

        //  dd($branch);
        return view('branch.edit', compact('branch', 'business_id'));
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
        // dd($id);

        try{
        $business_id = Auth::user()->business_id;
         $branch = Branch::findOrFail('id', $id);

        $validated = $request->validate([
            'branch_name' => 'required|string|max:255',
            'branch_no' => 'required|string|max:50',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'manager' => 'nullable|string|max:255',
        ]);

        $branch->update($validated);

        return redirect()->route('branch.edit')->with('success', 'Branch updated successfully.');
        } catch (\Exception $e){
            return redirect()->route('branch.edit')->with('error', 'Failed to update the branch.');
        }

        
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
