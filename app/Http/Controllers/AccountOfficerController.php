<?php

namespace App\Http\Controllers;

use App\Models\AccountOfficer;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $business_id = $user->business_id;
        $officer = AccountOfficer::where('business_id', $business_id);
        $branch = Branch::where('business_id', $business_id);
        return view('account_officer.index', compact('officer', 'business_id', 'branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewOfficer()
    {
        $user = Auth::user();
        $business_id = $user->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        return view('account_officer.create', compact('business_id', 'branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewOfficer(Request $request)
    {
        $user = Auth::user();
        $business_id = $user->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        $request->validate([
            'roles' => 'required|string',
            'name' => 'required',
            'email' => 'required|unique:account_officers|email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $accountOfficer = new AccountOfficer();
        $accountOfficer->name = $request->input('account_officer_name');
        $accountOfficer->roles = $request->input('roles');
        $accountOfficer->email = $request->input('email');
        $accountOfficer->phone = $request->input('phone');
        $accountOfficer->officer_number = $request->input('account_officer_number');
        $accountOfficer->address = $request->input('address');
        $accountOfficer->business_id = $business_id;
        $accountOfficer->branch_id = $branch->id;

        $accountOfficer->save();

        session()->flash('success', 'Thanks for filling. Your form submitted successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountOfficer  $accountOfficer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountOfficer  $accountOfficer
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
     * @param  \App\Models\AccountOfficer  $accountOfficer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountOfficer  $accountOfficer
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountOfficer $accountOfficer)
    {
        //
    }
}
