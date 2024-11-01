<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'business_id'
    ];
}
