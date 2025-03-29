<?php

namespace App\Http\Controllers;

use App\Models\SavingsProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SavingsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_id = Auth::user()->business_id;
        $savingsproduct = SavingsProduct::where('business_id', $business_id)->get();
        return view ('transactions.all_savings_product', compact('savingsproduct', 'business_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.savings_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createSavingsProduct(Request $request)
    {
        $business_id = Auth::user()->business_id;
        // dd($business_id);

        try{
            $request->validate([
                'product_name' => ['required', 'string', 'max:255'],
                'product_code' => ['required'],
                'description' => ['nullable'],
                'min_deposit' => ['nullable'], 
                'max_deposit' => ['nullable'], 
                'interest_rate' => ['nullable'],
                'duration' => ['nullable'],
                'target_amount' => ['nullable'],
                'maximum_withdrawal_amount' => ['nullable'],
                'opening_fee' => ['nullable'],
                'maintenance_fee' => ['nullable'],    
            ]);  
        }catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation errors:', $e->errors());
            return back()->withErrors($e->errors());  // Display errors back to the user
        }

            // Check if the product name already exists for this business_id
        $existingProduct = SavingsProduct::where('business_id', $business_id)
                                            ->where('product_name', $request->product_name)
                                            ->first();

        if ($existingProduct) {
        // If it exists, return an error message
        Log::info("Savings Product with name {$request->product_name} already exists for business_id {$business_id}");
        return back()->withErrors(['product_name' => 'This product name already exists for your business profile.']);
        }

        try {
            $sproduct = SavingsProduct::create([
                'product_name' => $request->product_name,
                'business_id' => $business_id,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'min_deposit' => $request->min_deposit, 
                'max_deposit' => $request->max_deposit, 
                'interest_rate' => $request->interest_rate,       
                'duration' => $request->duration,
                'target_amount' => $request->target_amount,
                'maximum_withdrawal_amount' => $request->maximum_withdrawal_amount,
                'opening_fee' => $request->opening_fee,
                'maintenance_fee' => $request->maintenance_fee,    
            ]);

            return redirect()->back()->with('success', 'Savings Product created');
            
        Log::info('Savings Product created: ', ['product_name' => $request->product_name, 'business_id' => $business_id]);
        } catch (\Exception $e) {
            Log::error('Error creating savings product: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function displaySavingsProductDetails($id)
    {
        $business_id = Auth::user()->business_id;
        $savingsProduct = SavingsProduct::where('id', $id)
                    ->where('business_id', $business_id)
                    ->firstOrFail();
        
            $no_of_account = Transaction::where('savings_product', $savingsProduct->product_name)
                    ->where('business_id', $business_id)
                    ->count();
            $savings_product_transactions = Transaction::where('savings_product', $savingsProduct->product_name)
                    ->where('business_id', $business_id)
                    ->get();
            // return $transactions;
            $savings_product_credit = Transaction::where('savings_product', $savingsProduct->product_name)
                    ->where('business_id', $business_id)
                    ->where('transaction_type', 'credit')
                    ->sum('inflow_amount');
            $savings_product_debit = Transaction::where('savings_product', $savingsProduct->product_name)
                    ->where('business_id', $business_id)
                    ->where('transaction_type', 'debit')
                    ->sum('outflow_amount');
            $savings_product_balance = $savings_product_credit - $savings_product_debit;

            // dd($savingsProduct, $savings_product_transactions, $no_of_account, $savings_product_credit, $savings_product_debit, $savings_product_balance); 
            return view('transactions.savings_product_details', compact('savingsProduct', 'savings_product_transactions', 'no_of_account', 'savings_product_credit', 'savings_product_debit', 'savings_product_balance')); 
        // });
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function editSavingsProduct($id)
    {
        $business_id = Auth::user()->business_id;
        $savingsProduct = SavingsProduct::where('id', $id)->where('business_id', $business_id)->firstOrFail();
        // dd($savingsProduct);
        return view('transactions.edit_savings_product', compact('savingsProduct', 'business_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function updateSavingsProduct(Request $request, $id)
    {
        try{
            $business_id = Auth::user()->business_id;
             $savingsProduct = SavingsProduct::findOrFail($id);
    
            $validated = $request->validate([
                'product_name' => 'required|string|max:255',
                'min_deposit' => 'required|string|max:50',
                'max_deposit' => 'required|string|max:15',
                'interest_rate' => 'nullable|numeric',
                'duration' => 'nullable',
                'opening_fee' => 'nullable|numeric',
                'target_amount' => 'nullable|numeric',
                'maintenance_fee' => 'nullable|numeric',
                'maximum_withdrawal_amount' => 'nullable|numeric',
                'description' => 'nullable',
            ]);

            // dd($savingsProduct);
    
            $savingsProduct->update($validated);
    
            return redirect()->back()->with('success', 'Product updated successfully.');
            } catch (\Exception $e){
                return redirect()->back()->with('error', 'Failed to update the product.');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingsProduct $savingsProduct)
    {
        //
    }
}
