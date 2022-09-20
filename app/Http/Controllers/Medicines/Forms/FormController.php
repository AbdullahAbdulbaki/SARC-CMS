<?php

namespace App\Http\Controllers\Medicines\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    // Get All Diseases category
    Public function Form_read()
    {
        $Form = Form::orderBy('id')->get();
        return view('admin.Medicines.Forms.Form',compact('Form'));
    }
    //show Diseases category Info By ID
    public function Form_show($id)
    {
        $Form = Form::where('id',$id)->first();
        return view ('admin.Medicines.Forms.show',compact('Form'));
    }

    // Add new Diseases category
    Public function Form_index()
    {
        return view ('admin.Medicines.Forms.add');
    }

    public function Form_store(Request $request)
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
        Form::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,



        ]);
        return redirect('/Form/all')->with(['success'=> 'Form added successfully']) ;
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
            'ar_name' => 'required|max:50|unique:MedicinesForm,ar_name',
            'en_name'=>'required|max:50|unique:MedicinesForm,en_name' ,


        ];
    }
    //delete Diseases category by id
    public function delete_Form($id)
    {
        Form::where('id',$id)->delete();
        return back()->with('Form_delete','Form Info has been deleted Succesfully');
    }

    //update program by id
    public function edit_Form($id)
    {
        $Form =Form::find($id);
        return view ('admin.Medicines.Forms.edit',compact('Form'));
    }

    Public function update_Form(Request $request)
    {
        $Form = Form::find($request->id);
        $Form->en_name = $request->en_name;
        $Form->ar_name = $request->ar_name;
        $Form->save();
        return redirect('/Form/all')->with('success','Form Information updated Successfully');
    }
}
