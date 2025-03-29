<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    use HasFactory;

    protected $fillable = [
        'branch_name',
        'address',
        'email',
        'phone',
        'branch_no',
        'business_id',
        'manager',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
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

    public function account_system()
    {
        return $this->hasMany(AccountSystem::class);
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

    public function investment()
    {
        return $this->hasMany(Investment::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
    
    public function corporateCustomer()
    {
        return $this->hasMany(CorporateCustomer::class);
    }

    public function accountOfficer()
    {
        return $this->hasMany(AccountOfficer::class);
    }
}
