<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labtest extends Model
{
    use HasFactory;

    protected $table='labtest';
    protected $fillable = [
        'ar_name',
        'en_name',
        'code',
    ];

}
