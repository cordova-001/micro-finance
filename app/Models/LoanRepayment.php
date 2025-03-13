<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepayment extends Model
{
    use HasFactory;

    protected $table = 'loan_repayments';

    protected $fillable = [
        'loan_id',
        'customer_id',
        'paid_amount',
        'paid_date',
        'payment_means',
        'payment_reference',
        'business_id',
        'branch_id',
        'schedule_id',
        'collected_by',

    ];
}
