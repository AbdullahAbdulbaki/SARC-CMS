<?php

namespace App\Models\Health_system;

use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nationality;
use App\Models\Disablity;
use App\Models\Document;
use App\Models\MedicalPoint;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';


    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'registration_date',
        'birth_date',
        'nationality_id',
        'phone',
        'mobile',
        'file_id',
        'Gender',
        'is_disablity',
        'mp_id',
        'is_displaced',
        'old_city_id',
        'old_area_id',
        'new_city_id',
        'new_area_id',
        'disablity_id',
        'document_id',
        'document_type',
        'unhcr_number',
        'fullcode',

    ];


    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function medicalpoint()
    {
        return $this->belongsTo(MedicalPoint::class,'mp_id');
    }

    public function disablity()
    {
        return $this->belongsTo(Disablity::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class,'new_area_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'new_city_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class,'document_type');
    }
}
