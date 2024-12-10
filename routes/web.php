<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LoanProductController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CustomerControllers;
use App\Http\Controllers\HighChartController;
use App\Http\Controllers\SavingsProductController;
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
    return view('welcome');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('/branch', BranchController::class);
    Route::get('/create-branch', [BranchController::class, 'create'])->name('branch.create');
    Route::get('/all-branch', [BranchController::class, 'index'])->name('branch.index');


    //Loan product uri later
    Route::resource('/loan_product', LoanProductController::class);
    Route::get('/loan-product', [LoanProductController::class, 'index'])->name('loan.product');
    Route::get('/create-loan-product', [LoanProductController::class, 'create'])->name('loan.create_product');

    //center uri
    Route::resource('/center', CenterController::class);
    Route::get('/create-center', [CenterController::class, 'create'])->name('center.create');

    //financial account url details
    Route::resource('chart', ChartController::class);
    Route::get('/create_chart_of_account', [ChartController::class, 'create'])->name('account.create');
    Route::get('/chart_of_account', [ChartController::class, 'index'])->name('account.chart');

    //customer url details
    Route::resource('chart', CustomerControllers::class);
    Route::get('/create_customer', [CustomerControllers::class, 'create'])->name('customer.create');
    Route::get('/customer', [CustomerControllers::class, 'index'])->name('customer.index');
    Route::post('/new_customer', [CustomerControllers::class, 'addCustomer'])->name('customer.add');

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
    Route::get('/manage_withdrawal', [TransactionController::class, 'manageWithdrawal'])->name('manage_withdrawal');

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
    Route::get('manage_savings', function () {
        return view('transactions.manage_savings');
    });
    Route::get('loan_management', function () {
        return view('loan.loan_management');
    });

    Route::get('loan_request', function () {
        return view('loan.request_loan');
    });

    Route::get('customer_details', function(){
        return view('customer.details');
    });
    
    
});



