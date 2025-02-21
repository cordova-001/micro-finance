<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Transaction;
use App\Models\SavingsProduct;
use App\Models\Loans;
use App\Models\InvestmentProducts;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class InternetBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSavingsProducts()
    {
        $business_id = Auth::user()->business_id;
        $getProduct = SavingsProduct::all();
        return view('internet_banking.all_savings_products', compact('business_id', 'getProduct'));
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
