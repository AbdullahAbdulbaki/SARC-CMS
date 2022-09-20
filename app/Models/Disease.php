<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diseasecat;

class Disease extends Model
{
    use HasFactory;

    protected $table = 'diseases';

    protected $fillable = [
        'ar_name',
        'en_name',
        'disease_name',
        'code',
        'cat_id'
    ];

    public function category()
    {
        return $this->belongsTo(Diseasecat::class,'cat_id');
    }

}
