<?php

namespace App\Http\Controllers\Health_system\patients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Assistant;
use App\Models\City;
use App\Models\Clinic;
use App\Models\Disablity;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Document;
use App\Models\Health_system\Patient;
use App\Models\Health_system\Visit;
use App\Models\Labtest;
use App\Models\Medical_services;
use App\Models\Nationality;
use App\Models\User;
use App\Models\Xray;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    // Get All Programs
    Public function Patients_read()
    {
        $Patients = Patient::Where('mp_id','=',function ($query){
            $query->selectRaw('mp_id')->from('users')->where('id','=',auth()->user()->id);
        })->get();
        return view('Health_System.Patients.Patients',compact('Patients'));
    }
    //show Program Info By ID
    public function Patients_show($id)
    {
        $Patients = Patient::where('id',$id)->first();
        $nationalities=Nationality::all();
        $disablities=Disablity::all();
        $cities=City::all();
        $areas=Area::all();
        $documents=Document::all();
        return view ('Health_System.Patients.show',compact('Patients','nationalities','disablities','cities','areas','documents'));
    }


        // Add new Programs
        Public function file_patients($id)
        {
            $Patients = Patient::orderBy('id')->get();
            $nationalities=Nationality::all();
            $disablities=Disablity::all();
            $cities=City::all();
            $areas=Area::all();
            $documents=Document::all();
            return view ('Health_System.patients.file',compact('Patients','nationalities','disablities','cities','areas','documents'));
        }

    // Add new Programs
    Public function Patients_index()
    {
        $Patients = Patient::orderBy('id')->get();

        $nationalities=Nationality::all();
        $disablities=Disablity::all();
        $cities=City::all();
        $areas=Area::all();
        $documents=Document::all();
        return view ('Health_System.Patients.add',compact('Patients','nationalities','disablities','cities','areas','documents'));
    }




    public function Patients_store(Request $request)
    {



    switch ($request->input('action')) {
        case 'save':
            $rules = $this ->getrules();
            $messages = $this ->getmessages();
            //validate Data Before Store in DB
            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInputs($request->all());
            }

            //insert data in DB
            Patient::Create([
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'father_name'=> $request->father_name,
                'mother_name'=> $request->mother_name,
                'Gender'=> $request->Gender,
                'is_disablity'=> $request->is_disablity,
                'is_displaced'=> $request->is_displaced,
                'registration_date'=> $request->registration_date,
                'birth_date'=> $request->birth_date,
                'nationality_id'=> $request->nationality_id,
                'phone'=> $request->phone,
                'unhcr_number'=> $request->unhcr_number,
                'document_id'=> $request->document_id,
                'document_type'=> $request->document_type,
                'mobile'=> $request->mobile,
                'file_id'=> $request->file_id,
                'disablity_id'=> $request->disablity_id,
                'old_city_id'=> $request->old_city_id,
                'old_area_id'=> $request->old_area_id,
                'new_city_id'=> $request->new_city_id,
                'new_area_id'=> $request->new_area_id,
                'mp_id'=> auth()->user()->mp_id,
                'fullcode'=>auth()->user()->medicalpoint->en_name,


            ]);
            return redirect('/patients/all')->with(['success'=> 'Patients added successfully']) ;

            break;

        case 'add_visit':
            $rules = $this ->getrules();
            $messages = $this ->getmessages();
            //validate Data Before Store in DB
            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInputs($request->all());
            }

            //insert data in DB
          $Patients=  Patient::Create([
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'father_name'=> $request->father_name,
                'mother_name'=> $request->mother_name,
                'Gender'=> $request->Gender,
                'is_disablity'=> $request->is_disablity,
                'is_displaced'=> $request->is_displaced,
                'registration_date'=> $request->registration_date,
                'birth_date'=> $request->birth_date,
                'nationality_id'=> $request->nationality_id,
                'phone'=> $request->phone,
                'unhcr_number'=> $request->unhcr_number,
                'document_id'=> $request->document_id,
                'document_type'=> $request->document_type,
                'mobile'=> $request->mobile,
                'file_id'=> $request->file_id,
                'disablity_id'=> $request->disablity_id,
                'old_city_id'=> $request->old_city_id,
                'old_area_id'=> $request->old_area_id,
                'new_city_id'=> $request->new_city_id,
                'new_area_id'=> $request->new_area_id,
                'mp_id'=> auth()->user()->mp_id,


            ]);



            return redirect()->route('Health_system.visits.add2',[$Patients->id]);

            break;


    }


    }

            // Define Error Messages
            protected function getmessages()
            {
                return $messages =[
                    'first_name.required' => 'First name is required',
                    'first_name.max' => 'First  name must not exceed 50 character',
                    'first_name.unique' => 'First  name is already exsist',
                    'last_name.required' => 'Last name is required',
                    'last_name.max' => 'Last name must not exceed 50 character',
                    'last_name.unique' => 'Last name is already exsist',



                ];
            }
        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'first_name' => 'required|max:50|unique:patients,first_name',
            'last_name'=>'required|max:50|unique:patients,last_name' ,

        ];
    }
    //delete program by id
    public function delete_Patients($id)
    {
        Patient::where('id',$id)->delete();
        return back()->with('Patients_delete','Patients Info has deleted Succesfully');
    }

    //update program by id
    public function edit_Patients($id)
    {
        $Patients =Patient::find($id);
        $nationalities=Nationality::all();
        $disablities=Disablity::all();
        $cities=City::all();
        $areas=Area::all();
        $documents=Document::all();
        return view ('Health_System.Patients.edit',compact('Patients','nationalities','disablities','cities','areas','documents'));
    }

    Public function update_Patients(Request $request)
    {
        $Patients = Patient::find($request->id);
        $Patients->first_name= $request->first_name;
        $Patients->last_name = $request->last_name;
        $Patients->father_name = $request->father_name;
        $Patients->mother_name = $request->mother_name;
        $Patients->Gender  = $request->Gender;
        $Patients->is_disablity = $request->is_disablity;
        $Patients->is_displaced = $request->is_displaced;
        $Patients->registration_date = $request->registration_date;
        $Patients->birth_date = $request->birth_date;
        $Patients->nationality_id = $request->nationality_id;
        $Patients->phone = $request->phone;
        $Patients->unhcr_number = $request->unhcr_number;
        $Patients->document_id = $request->document_id;
        $Patients->document_type = $request->document_type;
        $Patients->mobile = $request->mobile;
        $Patients->file_id= $request->file_id;
        $Patients->disablity_id = $request->disablity_id;
        $Patients->old_city_id = $request->old_city_id;
        $Patients->old_area_id  = $request->old_area_id;
        $Patients->new_city_id  = $request->new_city_id;
        $Patients->new_area_id  = $request->new_area_id;
        $Patients->save();
        return redirect('/patients/all')->with('success','Patients Information updated Successfully');
    }
}
