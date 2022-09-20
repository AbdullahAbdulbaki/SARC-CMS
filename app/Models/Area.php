<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\City;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_name','ar_name','code','district_id','city_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}

