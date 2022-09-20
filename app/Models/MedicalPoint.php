<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalPoint extends Model
{
    use HasFactory;

    protected $table ='medical_points';
    protected $fillable = [
        'ar_name',
        'en_name',
        'code',
        'city_id',
        'area_id',
    ];

}
