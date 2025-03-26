<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
         'first_name', 
         'middlename',
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
         'signature', 
         'id_card', 
         'passport',
         'middle_name',
         'bvn',
         'phone_next_of_kin',
         'title',
         'uploads', 
    ];

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function savings()
    {
        return $this->hasMany(Savings::class);
    }

    public function chart()
    {
        return $this->hasMany(Chart::class);
    }

    public function center()
    {
        return $this->hasMany(Center::class);
    }

    public function loanProduct()
    {
        return $this->hasMany(LoanProduct::class);
    }

    public function savingsProduct()
    {
        return $this->hasMany(SavingsProduct::class);
    }
    



}

// 1004263561
// uba
// smartweb
