<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_services extends Model
{
    use HasFactory;

    protected $table ='medical_services';
    protected $fillable = [
        'ar_name',
        'en_name',
        'code',
    ];

}
