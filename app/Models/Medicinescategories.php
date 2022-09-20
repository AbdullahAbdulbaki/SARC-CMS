<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicinescategories extends Model
{
    use HasFactory;

    protected $table ='Medicinescategory';
    protected $fillable = [
        'ar_name',
        'en_name',
        'code',
    ];

}
