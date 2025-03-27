<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected   $fillable = [
        'account_number',
        'account_name',
        'branch_id',
        'deposit_date',
        // 'withdrawal_date',
        'outflow_amount',
        'inflow_amount',
        'transaction_id',
        'narration',
        'withdrawn_by',
        'depositor_name',
        'depositor_phone',
        'savings_product',
        'transfer_amount',
        'transfer_source_account',
        'transfer_destination_account',
        'transfer_date',
        'total_balance',
        'customer_id',
        'transaction_type',
        'business_id',
        'transaction_date',
        'staff',
        'transaction_means',
        'file,'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
