<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'business_name',
        'business_id',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    // One business profile has many loans
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function account_system()
    {
        return $this->hasMany(AcountSystem::class);
    }

    // One business profile has many investments
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    // One business profile has many transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function loanProducts()
    {
        return $this->hasMany(LoanProduct::class);
    }

    public function savingsProducts()
    {
        return $this->hasMany(SavingsProduct::class);
    }

    public function charts()
    {
        return $this->hasMany(Chart::class);
    }

    public function generalLedger()
    {
        return $this->hasMany(GeneralLedgerAccount::class);
    }
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
