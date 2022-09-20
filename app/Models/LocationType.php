<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{


    use HasFactory;
    protected $table = 'locationtypes';
    protected $fillable = [
        'ar_name',
        'en_name',
    ];

}
