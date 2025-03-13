<?php

namespace App\Http\Controllers;
use App\Models\BankAccount;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function availableBankAccount()
    {
        $business_id = Auth::user()->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        $bank_accounts = BankAccount::where('business_id', $business_id)->where('branch_id', $branch->id)->get();
        return view('loan.request_loan', compact('bank_accounts'));
    }

    public function createBankAccount(Request $request)
    {
        try{

        $request->validate([
            'bank_name' => 'required',
            'code' => 'required',
        ]);

        $business_id = Auth::user()->business_id;        
        $branch = $request->input('branch');
        $bank_name = $request->input('bank_name');
        $account_code = $request->input('code');      

        BankAccount::create([
            'business_id' => $business_id,
            'branch_id' => $branch,
            'bank_name' => $bank_name,
            'account_code' => $account_code
        ]);

                
        return redirect()->back()->with('success', 'Bank Account created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function getBranch()
    {
        $business_id = Auth::user()->business_id;
        $branch = Branch::where('business_id', $business_id)->get();
        return view('loan.request_loan', compact('branch'));
    }
}
