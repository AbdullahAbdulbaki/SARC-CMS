<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;


class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_name','ar_name','code',
    ];


    public function region()
    {
        return $this->hasMany(Region::class);
    }




}
