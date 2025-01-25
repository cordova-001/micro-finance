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

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function savings()
    {
        return $this->hasMany(Savings::class);
    }

    public function branches()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
