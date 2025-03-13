<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralLedger extends Model
{
    use HasFactory;

    protected $table = 'general_ledger';

    protected $fillable = [
        'transaction_id',
        'account_id',
        'transaction_type',
        'debit',
        'credit',
        'description',
        'transaction_date',
        'reference_id',
        'created_by',
        'business_id',
        'branch_id',
        'balance',
        'account_name',
        'account_number',
    ];
    
    public function account()
    {
        return $this->belongsTo(ChartOfAccount::class, 'account_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function user()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
