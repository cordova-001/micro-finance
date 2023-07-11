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
        'branch_no'
    ];

     public function centers()
    {
        return $this->hasMany(Center::class);
    }
}
