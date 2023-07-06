<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'center_name',
        'address',
        'email',
        'phone',
        'center_id'
    ];
}
