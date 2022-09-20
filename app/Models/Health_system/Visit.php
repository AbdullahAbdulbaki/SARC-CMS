<?php

namespace App\Models\Health_system;

use App\Models\Assistant;
use App\Models\Disease;
use App\Models\Health_system\Patient;
use App\Models\Labtest;
use App\Models\Clinic;
use App\Models\Medical_services;
use App\Models\Xray;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits';


    protected $fillable = [
        'visit_date',
        'patient_id',
        'clinic_id',
        'doctor_id',
        'assistant_id',
        'diagnosis_id',
        'ms_id',
        'labtest_id',
        'xray_id',
        'mp_id',

    ];


    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function assistant()
    {
        return $this->belongsTo(Assistant::class);
    }
    public function diagnosis()
    {
        return $this->belongsTo(Disease::class);
    }
    public function xray()
    {
        return $this->belongsTo(Xray::class);
    }
    public function labtest()
    {
        return $this->belongsTo(Labtest::class);
    }
    public function medical_services()
    {
        return $this->belongsTo(Medical_services::class,'ms_id');
    }

}
