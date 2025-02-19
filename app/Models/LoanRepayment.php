<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'customer_id',
        'amount',
        'payment_date',
        'payment_method',
        'payment_reference',
        'business_id',
        'branch_id',
        'user_id',
        'created_by',
        'updated_by',
    ];
}
