<?php

namespace App\Http\Controllers\Nationality;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nationality;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class NationalityController extends Controller
{
    // Get All Programs
    Public function nationality_read()
    {
        $nationalities = Nationality::orderBy('id')->get();
        return view('admin.nationalities.nationalities',compact('nationalities'));
    }
    //show Program Info By ID
    public function nationality_show($id)
    {
        $nationalities = Nationality::where('id',$id)->first();
        return view ('admin.Nationalities.show',compact('nationalities'));
    }

    // Add new Programs
    Public function nationality_index()
    {
        return view ('admin.Nationalities.add');
    }

    public function nationality_store(Request $request)
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
        Nationality::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,
            'code'=> $request->code,
            'hasUNHCR'=> $request->hasUNHCR,

        ]);
        return redirect('/nationalities/all')->with(['success'=> 'Nationality added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'ar_name.required' => 'Arabic name is required',
            'ar_name.max' => 'Arabic name must not exceed 50 character',
            'ar_name.unique' => 'Arabic name is already exsist',
            'en_name.required' => 'English name is required',
            'en_name.max' => 'English name must not exceed 50 character',
            'en_name.unique' => 'English name is already exsist',



        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'ar_name' => 'required|max:50|unique:nationalities,ar_name',
            'en_name'=>'required|max:50|unique:nationalities,en_name' ,

        ];
    }
    //delete program by id
    public function delete_nationality($id)
    {
        Nationality::where('id',$id)->delete();
        return back()->with('Nationality_delete','Nationality Info has deleted Succesfully');
    }

    //update program by id
    public function edit_nationality($id)
    {
        $Nationalities =Nationality::find($id);
        return view ('admin.Nationalities.edit',compact('Nationalities'));
    }

    Public function update_nationality(Request $request)
    {
        $Nationalities = Nationality::find($request->id);
        $Nationalities->en_name = $request->en_name;
        $Nationalities->ar_name = $request->ar_name;
        $Nationalities->code = $request->code;
        $Nationalities->hasUNHCR = $request->hasUNHCR;
        $Nationalities->save();
        return redirect('/nationalities/all')->with('success','Nationality Information updated Successfully');
    }
}
