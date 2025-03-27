<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CorporateCustomer;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CorporateAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccountForm()
    {
        $user = Auth::user();
        $business_id = $user->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        return view('customer.create_corporate', compact('branch', 'business_id'));
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
            'company_email' => 'required|unique:corporate_account|email',
            'company_phone' => 'required|unique:corporate_account',
            'customer_id' => 'required',
            'passport' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'uploads.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            
        ]);
        try{

        $customer = new CorporateCustomer();
        $customer->company_name = $request->input('company_name');
        $customer->company_address = $request->input('comapny_address');
        $customer->company_email = $request->input('company_email');
        $customer->company_phone = $request->input('company_phone');
        $customer->tin = $request->input('tin');
        $customer->bvn = $request->input('bvn');
        $customer->cac_rc_no = $request->input('cac_rc_no');
        $customer->customer_id = $business_id.$customer_id;
        $customer->business_id = $business_id;
        $customer->branch_id = $request->input('branch_id');

        $customer->director_1_fname = $request->input('director_1_fname');
        $customer->director_1_mname = $request->input('director_1_mname');
        $customer->director_1_surname = $request->input('director_1_surname');
        $customer->director_1_email = $request->input('director_1_email');
        $customer->director_1_phone = $request->input('director_1_phone');
        $customer->director_1_address = $request->input('director_1_address');

        $customer->director_2_fname = $request->input('director_2_fname');
        $customer->director_2_mname = $request->input('director_2_mname');
        $customer->director_2_surname = $request->input('director_2_surname');
        $customer->director_2_email = $request->input('director_2_email');
        $customer->director_2_phone = $request->input('director_2_phone');
        $customer->director_2_address = $request->input('director_2_address');

        $customer->director_3_fname = $request->input('director_3_fname');
        $customer->director_3_mname = $request->input('director_3_mname');
        $customer->director_3_surname = $request->input('director_3_surname');
        $customer->director_3_email = $request->input('director_3_email');
        $customer->director_3_phone = $request->input('director_3_phone');
        $customer->director_3_address = $request->input('director_3_address');

                         
        if ($request->hasFile('passport1')) {
            $passport = $request->file('passport1');
            $imageName1 = time() . '_passport1.' . $passport->getClientOriginalExtension();
            $passport->move(public_path('images'), $imageName1);
            $customer->director_1_passport = $imageName1;
        }

        if ($request->hasFile('passport2')) {
            $passport = $request->file('passport2');
            $imageName2 = time() . '_passport2.' . $passport->getClientOriginalExtension();
            $passport->move(public_path('images'), $imageName1);
            $customer->director_2_passport = $imageName2;
        }

        if ($request->hasFile('passport3')) {
            $passport = $request->file('passport3');
            $imageName3 = time() . '_passport3.' . $passport->getClientOriginalExtension();
            $passport->move(public_path('images'), $imageName3);
            $customer->director_3_passport = $imageName3;
        }

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

        } catch (\Exception $e) {
            \Log::error('Error while saving corporate customer: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while submitting your form. Please try again later');
            return redirect()->back();
        }
    }

    public function getCorporateCustomers()
    {
        $business_id = Auth::user()->business_id;
        $customers = CorporateCustomer::where('business_id', $business_id)->get();
        return view('customer.all_corporate', compact('customers'));
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
