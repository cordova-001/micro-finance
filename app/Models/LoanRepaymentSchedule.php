<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepaymentSchedule extends Model
{
    use HasFactory;

    protected $table = 'repayment_schedules';

    protected $fillable = [
        'loan_id',
        'customer_id',
        'principal_amount',
        'interest_amount',
        'total_amount_due',
        'amount_due',
        'due_date',
        'status',
        'payment_date',
        'payment_method',
        'payment_reference',
        'business_id',
        'branch_id',
        'user_id',

    ];
}
