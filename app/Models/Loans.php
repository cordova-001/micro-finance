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
}
