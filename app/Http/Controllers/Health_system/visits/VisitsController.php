<?php

namespace App\Http\Controllers\Health_system\visits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Health_system\Visit;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Assistant;
use App\Models\Disease;
use App\Models\Health_system\Patient;
use App\Models\Labtest;
use App\Models\Xray;
use App\Models\Medical_services;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class VisitsController extends Controller
{
    // Get All Programs
    Public function visits_read()
    {
        $visits = Visit::orderBy('id')->get();
        return view('Health_System.visits.visits',compact('visits'));
    }
    //show Program Info By ID
    public function visits_show($id)
    {
        $visits = Visit::where('id',$id)->first();
        $patients=Patient::all();
        $clinics = Clinic::all();
        $doctors = Doctor::all();
        $assistants = Assistant::all();
        $diagnosiss=Disease::all();
        $Mss=Medical_services::all();
        $labtests=Labtest::all();
        $xrays=Xray::all();
        return view ('Health_System.visits.show',compact('visits','clinics','doctors','assistants','diagnosiss','labtests','xrays','Mss','patients'));
    }

    // Add new Programs
    Public function visits_index(Request $request)
    {
        $visits = Visit::orderBy('id')->get();
        $clinics = Clinic::all();
        $doctors = Doctor::all();
        $assistants = Assistant::all();
        $diagnosiss=Disease::all();
        $Mss=Medical_services::all();
        $labtests=Labtest::all();
        $xrays=Xray::all();
        $patients=$request->id;
        return view ('Health_System.visits.add',compact('visits','clinics','doctors','assistants','diagnosiss','labtests','xrays','Mss','patients'));
    }



    public function visits_store(Request $request)
    {

            $rules = $this ->getrules();
            $messages = $this ->getmessages();
            //validate Data Before Store in DB
            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInputs($request->all());
            }

            //insert data in DB
            Visit::Create([
                'visit_date' => $request->visit_date,
                'clinic_id' => $request->clinic_id,
                'doctor_id' => $request->doctor_id,
                'assistant_id' => $request->assistant_id,
                'diagnosis_id' => $request->diagnosis_id,
                'ms_id' => $request->ms_id,
                'labtest_id' => $request->labtest_id,
                'xray_id' => $request->xray_id,
                'patient_id' =>$request->id,
            ]);

            return redirect('/visits/all')->with(['success'=> 'visits added successfully']) ;
    }

            // Define Error Messages
            protected function getmessages()
            {
                return $messages =[
                ];
            }
        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
        ];
    }
    //delete program by id
    public function delete_visits($id)
    {
        Visit::where('id',$id)->delete();
        return back()->with('visit_delete','visits Info has deleted Succesfully');
    }

    //update program by id
    public function edit_visits($id)
    {
        $visits =Visit::find($id);
        $patients=Patient::all();
        $clinics = Clinic::all();
        $doctors = Doctor::all();
        $assistants = Assistant::all();
        $diagnosiss=Disease::all();
        $Mss=Medical_services::all();
        $labtests=Labtest::all();
        $xrays=Xray::all();
        return view ('Health_System.visits.edit',compact('visits','clinics','doctors','assistants','diagnosiss','labtests','xrays','Mss','patients'));
    }

    Public function update_visits(Request $request)
    {
        $visits = Visit::find($request->id);
        $visits->visit_date= $request->visit_date;
        $visits->patient_id= $request->patient_id;
        $visits->clinic_id= $request->clinic_id;
        $visits->doctor_id= $request->doctor_id;
        $visits->assistant_id= $request->assistant_id;
        $visits->diagnosis_id= $request->diagnosis_id;
        $visits->ms_id= $request->ms_id;
        $visits->xray_id= $request->xray_id;
        $visits->labtest_id= $request->labtest_id;

        $visits->save();
        return redirect('/visits/all')->with('success','visits Information updated Successfully');
    }
}
