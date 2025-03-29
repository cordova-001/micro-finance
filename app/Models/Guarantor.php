<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;

    protected $table = 'guarantor';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'business_id',
        'branch_id',
        'passport',
        'uploads'
    ];

    public function business()
    {
        return $this->belongsTo(User::class, 'business_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
