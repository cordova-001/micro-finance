<?php

namespace App\Http\Controllers;

use App\Models\SavingsProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
    public function show(SavingsProduct $savingsProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingsProduct $savingsProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavingsProduct $savingsProduct)
    {
        //
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
