<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LoanProductController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CustomerControllers;



Route::get('/', function () {
    return view('welcome');
});

//Branch Resource URI mgt
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