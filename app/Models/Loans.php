<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'branch_id',
        'customer_id',
        'business_id',
        'loan_product',
        'loan_amount',
        'total_repayment_amount',        
        'each_repayment_amount',
        'interest_rate',
        'repayment_period',
        'frequency',
        'application_date',
        'start_date',
        'staff',
        'status',
        'repayment_amount',
        'repayment_date',
        'repayment_status',
    ];

    // I want to create necessary relationships here for the loans table and other tables that are related to it such as the branch, customers, and loan products table
public function branch()
{
    return $this->belongsTo(Branch::class);
}

public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function loanProduct()
{
    return $this->belongsTo(LoanProduct::class, 'loan_product');
}


}
