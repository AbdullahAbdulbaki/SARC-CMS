<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'clinic_id',
        'is_active'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

}
