<?php

namespace App\Http\Controllers\Diseases;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Diseasecat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DiseasesController extends Controller
{
    // Get All Diseases
    public function diseases_read()
    {
        $Diseases = Disease::orderBy('id')->get();
        return view('admin.Diseases.Diseases', compact('Diseases'));
    }
    //show Diseases Info By ID
    public function diseases_show($id)
    {
        $Diseases = Disease::where('id', $id)->first();
        return view('admin.Diseases.show', compact('Diseases'));
    }

    // Add new Programs
    public function diseases_index()
    {
        $Diseases = Disease::orderBy('id')->get();
        $Diseasecats=Diseasecat::all();
        return view('admin.Diseases.add',compact('Diseases','Diseasecats'));
    }

    public function diseases_store(Request $request)
    {
        $rules = $this->getrules();
        $messages = $this->getmessages();
        //validate Data Before Store in DB
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        //insert data in DB
        Disease::Create([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'disease_name' => $request->disease_name,
            'code' => $request->code,
            'cat_id' => $request->cat_id,


        ]);
        return redirect('/diseases/all')->with(['success' => 'Diseases Info added successfully']);
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages = [
            'ar_name.required' => 'Arabic name is required',
            'ar_name.max' => 'Arabic name must not exceed 50 character',
            'ar_name.unique' => 'Arabic name is already exsist',
            'en_name.required' => 'English name is required',
            'en_name.max' => 'English name must not exceed 50 character',
            'en_name.unique' => 'English name is already exsist',
            'en_name.required' => 'disease name is required',
            'disease_name.required' => 'code  is required',
            'cat_id.required' => 'disease category name is required',

        ];
    }

    //Define rules on Inputs
    protected function getrules()
    {
        return $rules = [
            'ar_name' => 'required|max:50|unique:diseases,ar_name',
            'en_name' => 'required|max:50|unique:diseases,en_name',
            'disease_name' => 'required',
            'cat_id' => 'required',
            'code' => 'required',

        ];
    }
    //delete program by id
    public function delete_diseases($id)
    {
        Disease::where('id', $id)->delete();
        return back()->with('Disease_delete', 'Disease Info has deleted Succesfully');
    }

    //update program by id
    public function edit_diseases($id)
    {
        $Diseasecats=Diseasecat::all();
        $Diseases = Disease::find($id);
        return view('admin.Diseases.edit', compact('Diseases','Diseasecats'));
    }

    public function update_diseases(Request $request)
    {
        $Diseases = Disease::find($request->id);
        $Diseases->en_name = $request->en_name;
        $Diseases->ar_name = $request->ar_name;
        $Diseases->disease_name = $request->disease_name;
        $Diseases->code = $request->code;
        $Diseases->cat_id = $request->cat_id;
        $Diseases->save();
        return redirect('/diseases/all')->with('success', 'Disease Information updated Successfully');
    }
}
