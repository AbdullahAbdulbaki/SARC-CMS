<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agecategorygroup;

class Agegroupelement extends Model
{
    use HasFactory;

    protected $table = 'agegroupelements';

    protected $fillable = [
        'ar_name',
        'en_name',
        'group_id',
        'from',
        'to',
        'index',
    ];

    public function group()
    {
        return $this->belongsTo(Agecategorygroup::class);
    }

}
