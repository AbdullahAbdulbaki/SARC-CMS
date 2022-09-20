<?php

namespace App\Http\Controllers\Diseases;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Diseasecat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DiseasesCategoryController extends Controller
{
    // Get All Diseases category
    Public function diseasescat_read()
    {
        $Diseasescat = Diseasecat::orderBy('id')->get();
        return view('admin.Diseases.Category.Diseasescat',compact('Diseasescat'));
    }
    //show Diseases category Info By ID
    public function diseasescat_show($id)
    {
        $Diseasescat = Diseasecat::where('id',$id)->first();
        return view ('admin.Diseases.Category.show',compact('Diseasescat'));
    }

    // Add new Diseases category
    Public function diseasescat_index()
    {
        return view ('admin.Diseases.Category.add');
    }

    public function diseasescat_store(Request $request)
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
        Diseasecat::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,
            'code'=> $request->code,


        ]);
        return redirect('/diseasescat/all')->with(['success'=> 'Nationality added successfully']) ;
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
            'code.required' => 'Diseases Category Code is required',



        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'ar_name' => 'required|max:50|unique:diseasescat,ar_name',
            'en_name'=>'required|max:50|unique:diseasescat,en_name' ,
            //'code'=>'required',

        ];
    }
    //delete Diseases category by id
    public function delete_diseasescat($id)
    {
        Diseasecat::where('id',$id)->delete();
        return back()->with('diseasescat_delete','Diseases Category Info has deleted Succesfully');
    }

    //update program by id
    public function edit_diseasescat($id)
    {
        $Diseasecat =Diseasecat::find($id);
        return view ('admin.Diseases.Category.edit',compact('Diseasecat'));
    }

    Public function update_diseasescat(Request $request)
    {
        $Diseasecat = Diseasecat::find($request->id);
        $Diseasecat->en_name = $request->en_name;
        $Diseasecat->ar_name = $request->ar_name;
        $Diseasecat->code = $request->code;
        $Diseasecat->save();
        return redirect('/diseasescat/all')->with('success','Diseases Category Information updated Successfully');
    }
}
