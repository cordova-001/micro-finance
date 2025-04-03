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
    public function getOfficer()
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
        try{
        $user = Auth::user();
        $business_id = $user->business_id;
        // $branch = Branch::where('business_id', $business_id)->get();
        $request->validate([
            'roles' => 'required|string',
            'name' => 'required',
            'email' => 'required|unique:account_officers|email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $accountOfficer = new AccountOfficer();
        $accountOfficer->name = $request->input('name');
        $accountOfficer->roles = $request->input('roles');
        $accountOfficer->email = $request->input('email');
        $accountOfficer->phone = $request->input('phone');
        $accountOfficer->officer_number = $request->input('officer_number');
        $accountOfficer->address = $request->input('address');
        $accountOfficer->business_id = $business_id;
        $accountOfficer->branch_id = $request->input('branch_id');

        // dd($accountOfficer);
        $accountOfficer->save();

        session()->flash('success', 'Thanks for filling. Your form submitted successfully!');
    } catch (\Exception $e) {
        session()->flash('error', 'Something went wrong! Error: ' . $e->getMessage());
    }
        return redirect()->back()->with('success', 'The new user has been added successfully');

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
