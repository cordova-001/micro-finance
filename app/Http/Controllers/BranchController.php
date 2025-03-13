<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            
            return view('branch.show', compact('branch', 'loans', 'repayments', 'transactions'));
        
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
