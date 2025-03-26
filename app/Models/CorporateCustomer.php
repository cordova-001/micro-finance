<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateCustomer extends Model
{
    use HasFactory;

    protected $table = 'corporate_account';
    protected $fillable = [
        'company_name',
        'company_address',
        'company_email',
        'company_phone',
        'tin',
        'bvn',
        'cac_rc_no',
        'branch_id',
        'business_id',
        'business_id',
        'uploads',
        'director_1_fname',
        'director_1_mname',
        'director_1_surname',
        'director_1_email',
        'director_1_phone',
        'director_1_address',
        'director_1_passport',
        'director_2_fname',
        'director_2_mname',
        'director_2_surname',
        'director_2_email',
        'director_2_phone',
        'director_2_address',
        'director_2_passport',
        'director_3_fname',
        'director_3_mname',
        'director_3_surname',
        'director_3_email',
        'director_3_phone',
        'director_3_address',
        'director_3_passport',
    ];

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
