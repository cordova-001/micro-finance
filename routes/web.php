<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LoanProductController;
use App\Http\Controllers\LoanManagementController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CustomerControllers;
use App\Http\Controllers\HighChartController;
use App\Http\Controllers\SavingsProductController;
use App\Http\Controllers\InternetBankingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanRepaymentManagementController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\AccountOfficerController;
use App\Http\Controllers\AccountSystemController;
use App\Http\Controllers\InvestmentProductController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\LoanRepaymentController;
use App\Http\Controllers\LoanRepaymentScheduleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware(['auth']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('/branch', BranchController::class);
    Route::get('/create-branch', [BranchController::class, 'create'])->name('branch.create');
    Route::get('/all-branch', [BranchController::class, 'index'])->name('branch.index');
    Route::get('/branch/{id}/edit', [BranchController::class, 'edit'])->name('branch.edit');
    Route::put('/branch/{id}', [BranchController::class, 'update'])->name('branch.update');
    Route::get('/branch/{id}/details', [BranchController::class, 'show'])->name('branch.show');


    //Loan product uri later
    Route::resource('/loan_product', LoanProductController::class);
    Route::get('/loan-product', [LoanProductController::class, 'index'])->name('loan.product');
    Route::get('/create-loan-product', [LoanProductController::class, 'create'])->name('loan.create_product');
    Route::get('/loan_request', [LoanManagementController::class, 'newNewLoan'])->name('loan.loan_request');
    Route::post('/loan_process', [LoanManagementController::class, 'processLoan'])->name('loan.loan_process');
    Route::post('/loan_management/create_loan_request', [LoanManagementController::class, 'createLoanRequest'])->name('loan.create.loan_request');
    Route::get('/loan_management/get_loans', [LoanManagementController::class, 'getLoan'])->name('loan.loan_mgt');
    Route::get('/manage_loan/{id}', [LoanManagementController::class, 'manageLoan'])->name('loan.manage');
    Route::post('/manage_disbursed_loan/{id}', [LoanManagementController::class, 'manageDisbursedLoan'])->name('loan.manage.disbursed');
    Route::get('/guarantor', [LoanManagementController::class, 'newGuarantor'])->name('loan.guarantor');
    Route::post('/loan_management/disburse/{id}/', [LoanManagementController::class, 'disburseAndGenerateSchedule'])->name('loan.disburse');
    Route::get('/display_bank_account', [LoanManagementController::class, 'getBankAccount'])->name('loan.getBankAccount');

    // Route::get('view_repayment', [LoanRepaymentManagementController::class, 'viewRepayment'])->name('view_repayment');
    Route::post('generate_repayment_schedule/{id}/generate-schedule', [LoanRepaymentManagementController::class, 'generateRepaymentSchedule'])->name('generate_repayment_schedule');
    Route::get('repayment_schedule/{loan}', [LoanRepaymentManagementController::class, 'repaymentSchedule'])->name('repayment_schedule');
    Route::get('repayment_schedule/{loan}/edit', [LoanRepaymentManagementController::class, 'editRepaymentSchedule'])->name('edit_repayment_schedule');
    Route::put('repayment_schedule/{loan}', [LoanRepaymentManagementController::class, 'updateRepaymentSchedule'])->name('update_repayment_schedule');
    Route::post('make_payment/{loanId}', [LoanRepaymentManagementController::class, 'makeRepayment'])->name('make_payment');
    Route::get('view_repayment', [LoanRepaymentManagementController::class, 'getLoanRepayment'])->name('view_repayment');
    Route::get('pending_repayment', [LoanRepaymentManagementController::class, 'getPendingRepayment'])->name('pending_repayment');
    Route::get('due_loan', [LoanRepaymentManagementController::class, 'getDueLoansToday'])->name('due_loan_today');
    Route::get('get_due_loan', [LoanRepaymentManagementController::class, 'getDueLoans'])->name('due_loan');
    Route::get('get_branch_repayment', [LoanRepaymentManagementController::class, 'getDueLoans'])->name('due_loan');


    Route::get('/newIncome', [FinancialReportController::class, 'incomeForm'])->name('account.income');
    Route::get('/newExpenses', [FinancialReportController::class, 'incomeForm'])->name('account.expenses');

    Route::post('/new_bank_account', [BankAccountController::class, 'createBankAccount'])->name('bank_account.create');

    


    // Loan Management Details
    Route::put('approve_loan/{loan}', [LoanManagementController::class, 'approveLoanStatus'])->name('approve_loan');
    Route::get('disburse_loan/{loan}', [LoanManagementController::class, 'disburseLoan'])->name('disburse_loan');
    Route::put('reject_loan/{loan}', [LoanManagementController::class, 'rejectLoanStatus'])->name('reject_loan');
    Route::get('/loan_management/approved_loans', [LoanManagementController::class, 'getApprovedLoan'])->name('approved_loans');
    Route::get('/loan_management/rejected_loans', [LoanManagementController::class, 'getRejectedLoan'])->name('rejected_loans');
    Route::get('/loan_management/open_loans', [LoanManagementController::class, 'getDisbursedLoan'])->name('disbursed_loans');

    //financial account url details
    Route::resource('chart', ChartController::class);
    Route::get('/create_chart_of_account', [ChartController::class, 'create'])->name('account.create');
    Route::get('/chart_of_account', [ChartController::class, 'index'])->name('account.chart');
    Route::post('/add_chart', [ChartController::class, 'store'])->name('add_chart');

    //customer url details
    Route::resource('chart', CustomerControllers::class);
    Route::get('/create_customer', [CustomerControllers::class, 'create'])->name('customer.create');
    Route::get('/customer', [CustomerControllers::class, 'index'])->name('customer.index');
    Route::post('/new_customer', [CustomerControllers::class, 'addCustomer'])->name('customer.add');
    Route::get('/customer/{customer_id}/details', [CustomerControllers::class, 'getCustomerDetails'])->name('customer.details');
    Route::get('/customer/{customer_id}/edit', [CustomerControllers::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{customer_id}', [CustomerControllers::class, 'update'])->name('customer.update');
    Route::get('/getCustomer', [CustomerControllers::class, 'getCustomerToDashboard'])->name('customer.getCustomer');

    Route::get('/chart', [HighchartController::class, 'handleChart']);

    Route::get('/all_savings_product', [SavingsProductController::class, 'index'])->name('all.savings.product');
    Route::get('/add_savings_product', [SavingsProductController::class, 'create'])->name('savings.product');
    Route::post('/addSavingsProduct', [SavingsProductController::class, 'createSavingsProduct'])->name('savings.add.product');

    Route::get('/validate_account_number', [TransactionController::class, 'validateAccountNumber'])->name('validate.account.number');
    Route::get('/add_deposit', [TransactionController::class, 'newDeposit'])->name('customer.for.transaction');
    Route::post('/new_deposit', [TransactionController::class, 'addDeposit'])->name('add.new.deposit');
    Route::post('/confirm_account', [TransactionController::class, 'confirmAccountForWithdrawal'])->name('confirm.accountNo');
    Route::get('/add_withdrawal', [TransactionController::class, 'newWithdrawal'])->name('add.withdrawal');
    Route::post('/initiate_withdrawal', [TransactionController::class, 'addWithdrawal'])->name('initiate_withdrawal');
    Route::get('/start_transfer', [TransactionController::class, 'newTransfer'])->name('start_transfer');
    Route::post('/confirm_for_transfer', [TransactionController::class, 'ConfirmAccountForTransfer'])->name('confirm_for_transfer');
    Route::get('/manage_deposit', [TransactionController::class, 'manageDeposit'])->name('manage_deposit');

    Route::get('/general_ledger', [AccountSystemController::class, 'viewGeneralLedger'])->name('general_ledger');
    

    Route::get('/dashboard', [DashboardController::class, 'getDashboardStats'])->name('dashboard');


    Route::get('/manage_withdrawal', [TransactionController::class, 'manageWithdrawal'])->name('manage_withdrawal');



    Route::get('internet_banking/get_savings_product', [InternetBankingController::class, 'getSavingsProducts'])->name('ibank.get_product');

    Route::get('savings_product', function () {
        return view('transactions.savings_product');
    });
    Route::get('add_deposits', function () {
        return view('transactions.add_savings');
    });
    // Route::get('add_withdrawal', function () {
    //     return view('transactions.add_withdrawal');
    // });


    Route::get('intra_bank_transfer', function () {
        return view('transactions.intra_bank_transfer');
    });


    

    Route::get('internet_banking/my_loans', function () {
        return view('internet_banking.my_loans');
    });

    
    Route::get('internet_banking/all_product', function () {
        return view('internet_banking.all_savings_products');
    });

    Route::get('internet_banking/my_savings', function () {
        return view('internet_banking.my_savings');
    });

    Route::get('internet_banking/my_investments', function () {
        return view('internet_banking.my_investments');
    });

    Route::get('internet_banking/all_investments', function () {
        return view('internet_banking.all_investments');
    });








    Route::get('loan_management', function () {
        return view('loan.loan_management');
    });

    Route::get('bulk_repayment', function () {
        return view('loan.bulk_repayment');
    });

    // Route::get('customer_details', function(){
    //     return view('customer.details');
    // });

    Route::get('add_investment_product', function(){
        return view('investment.add_investment_product');
    });

    Route::get('all_investment', function(){
        return view('investment.investments');
    });

    Route::get('add_expenses', function(){
        return view('account.add_expenses');
    });

    Route::get('add_income', function(){
        return view('account.add_income');
    });
    
    Route::get('all_income', function(){
        return view('account.all_income');
    });

    Route::get('all_expenses', function(){
        return view('account.all_expenses');
    });

    // Reports

    Route::get('loan_report', function(){
        return view('reports.loan_report');
    });

    Route::get('customer_report', function(){
        return view('reports.customers_report');
    });

    Route::get('disbursement_report', function(){
        return view('reports.disbursement');
    });

    Route::get('ledger_report', function(){
        return view('reports.ledger');
    });
    Route::get('savings_report', function(){
        return view('reports.savings');
    });
    Route::get('savings_product_report', function(){
        return view('reports.savings_product');
    });
    Route::get('savings_report', function(){
        return view('reports.savings');
    });
    Route::get('withdrawal_report', function(){
        return view('reports.withdrawal');
    });
    Route::get('loan_product_report', function(){
        return view('reports.loan_product_report');
    });

    Route::get('cash_flow_statement', function(){
        return view('reports.cash_flow_cummulative');
    });

    

    Route::get('settings', function () {
        return view('settings.general');
    });
    Route::get('email_template', function () {
        return view('settings.email_template');
    });


    /**
     * 
     *   Report (Customer reports, Loan Report, Disbursement Report, Loan Product Report, Daily Report, Monthly Report etc)
     *   Accounting (Cash flow, Balance Sheet, Trial Balance, General Ledger, Chart of Account, Journal Entries etc)
     */

    Route::get('transactions_report', function(){
        return view('reports.transactions');
    });
    

    // Account Officer
    Route::get('add_account_officer', function(){
        return view ('account_officer.create');
    });

    Route::get('all_user', function(){
        return view ('account_officer.index');
    });

    Route::get('branch_detail', function(){
        return view ('branch.show');
    });
});



