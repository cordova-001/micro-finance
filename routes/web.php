<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LoanProductController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CustomerControllers;
use App\Http\Controllers\HighChartController;
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

    Route::get('savings_product', function () {
        return view('transactions.savings_product');
    });
    Route::get('add_deposit', function () {
        return view('transactions.add_savings');
    });
    Route::get('add_withdrawal', function () {
        return view('transactions.add_withdrawal');
    });
    Route::get('intra_bank_transfer', function () {
        return view('transactions.intra_bank_transfer');
    });
    Route::get('manage_savings', function () {
        return view('transactions.manage_savings');
    });
    Route::get('manage_withdrawal', function () {
        return view('transactions.manage_withdrawal');
    });
    
    
});



