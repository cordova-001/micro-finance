<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_product',
        'minimum_amount',
        'maximum_amount',
        'product_id',
        'interest_rate',
        'description',
        'business_id',
    ];
}
