<?php

namespace App\Http\Controllers\Medicines\categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Medicinescategories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // Get All Diseases category
    Public function Category_read()
    {
        $Category = Medicinescategories::orderBy('id')->get();
        return view('admin.Medicines.Categories.Category',compact('Category'));
    }
    //show Diseases category Info By ID
    public function Category_show($id)
    {
        $Category = Medicinescategories::where('id',$id)->first();
        return view ('admin.Medicines.Categories.show',compact('Category'));
    }

    // Add new Diseases category
    Public function Category_index()
    {
        return view ('admin.Medicines.Categories.add');
    }

    public function Category_store(Request $request)
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
        Medicinescategories::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,
            'code'=>$request->code,




        ]);
        return redirect('/Categories/all')->with(['success'=> 'Category added successfully']) ;
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
            'code.required' => 'Labtest Code is required',




        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'ar_name' => 'required|max:50|unique:MedicinesCategory,ar_name',
            'en_name'=>'required|max:50|unique:MedicinesCategory,en_name' ,
            'code' => 'required',


        ];
    }
    //delete Diseases category by id
    public function delete_Category($id)
    {
        Medicinescategories::where('id',$id)->delete();
        return back()->with('Category_delete','Category Info has been deleted Succesfully');
    }

    //update program by id
    public function edit_Category($id)
    {
        $Category =Medicinescategories::find($id);
        return view ('admin.Medicines.Categories.edit',compact('Category'));
    }

    Public function update_Category(Request $request)
    {
        $Category = Medicinescategories::find($request->id);
        $Category->en_name = $request->en_name;
        $Category->ar_name = $request->ar_name;
        $Category->code = $request->code;
        $Category->save();
        return redirect('/Categories/all')->with('success','Category Info  updated Successfully');
    }
}
