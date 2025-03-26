<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CorporateCustomer;
use App\Models\Branch;
use App\Models\User;

class CorporateAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccountForm()
    {
        $user = User::all();
        $business_id = $user->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        return view('customer.corporate_account', compact('branch', 'business_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCorporateCustomer(Request $request)
    {
        $business_id = Auth::user()->business_id;
        $customer_id = $request->input('customer_id');        
        // Validate the form data
        $request->validate([
            'company_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:customers|email',
            'phone' => 'required|unique:customers',
            'customer_id' => 'required',
            'passport' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'uploads.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            
        ]);

        $customer = new Customers();
        $customer->first_name = $request->input('first_name');
        $customer->middlename = $request->input('middlename');
        $customer->last_name = $request->input('last_name');
        $customer->address = $request->input('address');
        $customer->occupation = $request->input('occupation');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->state_of_origin = $request->input('state_of_origin');
        $customer->status = $request->input('status');
        $customer->date_of_birth = $request->input('date_of_birth');
        $customer->local_govt = $request->input('local_govt');
        $customer->choices = $request->input('gender');
        $customer->customer_id = $customer_id2;
        $customer->branch_id = $request->input('branch_id');
        $customer->state_of_origin = $request->input('state_of_origin');
        $customer->next_of_kin = $request->input('next_of_kin');
        $customer->address_of_next_of_kin = $request->input('address_of_next_of_kin');
        $customer->business_id = $business_id;
        $customer->bvn = $request->input('bvn');
        $customer->phone_next_of_kin = $request->input('phone_next_of_kin');
        $customer->title = $request->input('title'); 
        

        if ($request->hasFile('passport')) {
            $passport = $request->file('passport');
            $imageName1 = time() . '_passport.' . $passport->getClientOriginalExtension();
            $passport->move(public_path('images'), $imageName1);
            $customer->passport = $imageName1;
        }

        // ✅ Handle Multiple File Uploads
        // $uploadedFiles = [];
        // if ($request->hasFile('uploads')) {
        //     foreach ($request->file('uploads') as $file) {
        //         $fileName = time() . '_' . $file->getClientOriginalName();
        //         $file->move(public_path('images'), $fileName);
        //         $uploadedFiles[] = $fileName;
        //     }
        // }

        $uploadedFiles = [];

        if ($request->hasFile('uploads')) {
            foreach ($request->file('uploads') as $file) {
                \Log::info("File received: " . $file->getClientOriginalName());
                if ($file->isValid()) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $uploadedFiles[] = $fileName;
                }
            }
        }        

     // Store uploaded files as JSON in database
     $customer->uploads = json_encode($uploadedFiles);

    //  dd($request->all(), $request->file('uploads'));

    // dd($customer);
    $customer->save();

    // $this->sendEmail($tenant);

    session()->flash('success', 'Thanks for filling. Your form submitted successfully!');

    return redirect()->back();

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
