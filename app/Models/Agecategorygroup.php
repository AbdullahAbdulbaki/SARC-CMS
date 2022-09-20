<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agecategorygroup extends Model
{
    use HasFactory;

    protected $table = 'agecategorygroups';

    protected $fillable = [
        'ar_name',
        'en_name',
    ];

}
