<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'business_id',
        'product_code',
        'description',
        'min_deposit', 
        'max_deposit', 
        'interest_rate',       
        'duration',
        'target_amount',
        'maximum_withdrawal_amount',
        'opening_fee',
        'maintenance_fee',         
        'status',
    ];
}
