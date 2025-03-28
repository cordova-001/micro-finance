<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_type',
        'amount',
        'date',
        'file',
        'source_account',
        'destination_account',
        'category',
        'balance',
        'branch_id',
        'business_id',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
