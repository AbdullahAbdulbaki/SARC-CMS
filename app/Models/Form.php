<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table ='MedicinesForm';
    protected $fillable = [
        'ar_name',
        'en_name',
        'code',
    ];

}
