<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $table = 'journal_entry';

    protected $fillable = [
        'business_id',
        'branch_id',
        'transaction_id',
        'transaction_type',
        'account_number',
        'account_name',
        'debit',
        'credit',
        'balance',
        'description',
        'transaction_date',
        'created_by'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'business_id');
    }
}
