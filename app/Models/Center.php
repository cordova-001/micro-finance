<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Branch;

class Center extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'center_no',
        'branch_id'
    ];

     public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
