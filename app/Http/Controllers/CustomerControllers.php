<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Transaction;
use App\Models\Center;
use Illuminate\Support\Facades\DB;
class CustomerControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_id = Auth::user()->business_id;
        $customer = Customers::where('business_id', $business_id)->get();
        return view ('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business_id = Auth::user()->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        return view('customer.create', compact('branch'));
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

    public function addCustomer(Request $request)
    {
        $business_id = Auth::user()->business_id;
        $customer_id = $request->input('customer_id');
        $customer_id2 = $business_id.$customer_id;
    // Validate the form data
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:customers|email',
        'phone' => 'required|unique:customers',
        'customer_id' => 'required',
        'passport' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        'international_passport' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        'national_id' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
    ]);

        $customer = new Customers();
        $customer->first_name = $request->input('first_name');
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
        

    if ($request->hasFile('passport')) {
        $passport = $request->file('passport');
        $imageName1 = time() . '_passport.' . $passport->getClientOriginalExtension();
        $passport->move(public_path('images'), $imageName1);
        $customer->passport = $imageName1;
    }

    if ($request->hasFile('signature')) {
        $signature = $request->file('signature');
        $imageName2 = time() . 'signature.' . $signature->getClientOriginalExtension();
        $signature->move(public_path('images'), $imageName2);
        $customer->signature = $imageName2;
    }

    if ($request->hasFile('id_card')) {
        $id_card = $request->file('id_card');
        $imageName3 = time() . 'id_card.' . $id_card->getClientOriginalExtension();
        $id_card->move(public_path('images'), $imageName3);
        $customer->id_card = $imageName3;
    }

    // dd($customer);
    $customer->save();

    // $this->sendEmail($tenant);

    session()->flash('success', 'Thanks for filling. Your form submitted successfully!');

    return redirect()->back();

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCustomerDetails($customer_id)
    {
        try{
            $business_id = Auth::user()->business_id;
            $customer = Customers::where('customer_id', $customer_id)
                        ->where('business_id', $business_id)
                        ->firstOrFail();


                        // dd($customer); 

                        // Fetch Loans for this branch
            $loans = DB::table('loans')
                        ->where('customer_id', $customer_id)
                        ->where('business_id', $business_id)
                        ->get();
        

            $savings = DB::table('transactions')
                        ->where('account_number', $customer_id)
                        ->where('business_id', $business_id)
                        ->where('transaction_type', 'credit') 
                        ->get();

                        // dd($savings);

            $withdrawal = DB::table('transactions')
                        ->where('account_number', $customer_id)
                        ->where('business_id', $business_id)
                        ->where('transaction_type', 'debit') 
                        ->get();

            $totalSavings = Transaction::where('account_number', $customer_id)->sum('amount_paid');
            $totalWithdrawal = Transaction::where('account_number', $customer_id)->sum('amount_received');
            $totalBalance = $totalSavings - $totalWithdrawal;
            
            return view('customer.details', compact('customer', 'loans', 'savings', 'withdrawal', 'totalSavings', 'totalWithdrawal', 'totalBalance'));
        
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
