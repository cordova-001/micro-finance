<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\LoanProduct;
use App\Models\Branch;
use App\Models\Customers;
use Illuminate\Http\Request;

class LoanManagementController extends Controller
{
    public function newNewLoan()
    {
        $user = Auth::user();
        $branches = Branch::where('business_id', $user->business_id)->get();
        $customers = Customers::where('business_id', $user->business_id)->get();
        $lproduct = LoanProduct::where('business_id', $user->business_id)->get();        
        return view('loan.request_loan', compact('customers', 'user', 'lproduct', 'branches'));
    }

    public function processLoan(Request $request)
    {
        try {
            $user = Auth::user();
            $request->validate([
                'account_number' => 'required',
                'loan_product' => 'required',
                'loan_amount' => 'required',
                'frequency' => 'required',
                'branch' => 'required',
                'application_date' => 'required',
                'repayment_period' => 'required',
            ]);

            $business_id = $user->business_id;
            $account_number = $request->account_number;
            $loan_product = $request->loan_product;
            $loan_amount = $request->loan_amount;
            $frequency = $request->frequency;
            $branch = $request->branch;
            $application_date = $request->application_date;
            $duration = $request->duration;
            $staff = $request->staff;

            if(empty($account_number))
            {
                return redirect('loan.request_loan')->with('error', 'Account number can not be empty');
            }

            // get the details of the account from customer database
            $account_details = Customers::where('customer_id', $account_number)->first();
            // dd($account_details);

            /**
             * get deatils of the product name
             
             
             
             * display the detailsfor the confirmation in the next page before the form is submitted for processing
             */
            // dd($loan_product);
            if(!empty($loan_product))  // get full details about the selected loan product
            {
                $getLoanProduct = LoanProduct::where('loan_product', $loan_product)->where('business_id', $business_id)->first();
                // dd($getLoanProduct);
                if(!$getLoanProduct)
                {
                    return redirect()->back()->with('error', 'Invalid loan product selected')->withInput();
                }
                // * check if amount requested is within t eh minimum an dmaximum amount stated for the loan product
                if($loan_amount < $getLoanProduct->minimum_amount || $loan_amount > $getLoanProduct->maximum_amount)
                {
                    return redirect()->back()->with('error', 'Loan amount must be between ' . $getLoanProduct->minimum_amount . ' and ' . $getLoanProduct->maximum_amount)->withInput();
                }
                // Calculate the repayment amount with interest
                
                $interest_rate = $getLoanProduct->interest_rate;
                $interest_amount = $loan_amount * $interest_rate / 100;
                $repayment_amount = $loan_amount + ($loan_amount * $interest_rate / 100);
                // dd($repayment_amount);
                
                // Check repayment period to calculate expected amount to be paid back with interest
                $repayment_period = $request->repayment_period;
                if (empty($repayment_period) || !is_numeric($repayment_period) || $repayment_period <= 0) {
                    return redirect()->back()->with('error', 'Invalid repayment period')->withInput();
                }

                // Calculate the total repayment amount based on the repayment period
                $total_repayment_amount = $repayment_amount * $repayment_period;

                // Calculate each repayment amount by dividing the total repayment amount by the duration
                $each_repayment_amount = $repayment_amount / $repayment_period;

                // Display the details for confirmation in the next page before the form is submitted for processing
                return view('loan.confirm_loan', compact('account_number', 'account_details', 'user', 'interest_amount', 'loan_product', 'loan_amount', 'frequency', 'branch', 'application_date', 'staff', 'repayment_amount', 'repayment_period', 'total_repayment_amount', 'getLoanProduct', 'each_repayment_amount'));

                                                
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error processing loan: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error processing loan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the loan. Please try again.');
        }
    }
}
