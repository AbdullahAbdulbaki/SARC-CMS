<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disablity extends Model
{
    use HasFactory;
    protected $table = 'disablity';
    protected $fillable = [
        'ar_name',
        'en_name',
        'description',
    ];

}
