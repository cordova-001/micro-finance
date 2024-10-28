<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
         'first_name', 
         'last_name', 
         'email', 
         'phone', 
         'gender', 
         'address', 
         'state_of_origin', 
         'local_govt', 
         'next_of_kin',
         'address_of_next_of_kin', 
         'date_of_birth',
         'occupation', 
         'status', 
         'customer_id', 
         'branch_id', 
         'utility', 
         'id_card', 
         'paasport'
    ];

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }
}

// 1004263561
// uba
// smartweb
