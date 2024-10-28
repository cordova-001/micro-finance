<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanProduct;

class LoanProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan_product = LoanProduct::all();
        return view('loan.product', compact('loan_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'loan_product' => 'required',
            'minimum_amount' => 'required',
            'maximum_amount' => 'required',

            // if('minimum_amount' >= 'maximum_amount'){
            //     echo "The minimum amount must be less than maximum amount";
            // }
        ]);

        $loan_product = LoanProduct::create([
            'loan_product' => $request->input('loan_product'),
            'minimum_amount' => $request->input('minimum_amount'),
            'maximum_amount' => $request->input('maximum_amount'),
            'product_id' => $request->input('product_id'),
            'interest_rate' => $request->input('interest_rate'),
            'description' => $request->input('description')
        ]);

        return redirect('/loan_product');
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
