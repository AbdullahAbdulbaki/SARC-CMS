<?php

namespace App\Http\Controllers\Xray;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Xray;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class XrayController extends Controller
{
    // Get All Diseases category
    Public function Xray_read()
    {
        $Xray = Xray::orderBy('id')->get();
        return view('admin.Xray.Xray',compact('Xray'));
    }
    //show Diseases category Info By ID
    public function Xray_show($id)
    {
        $xray = Xray::where('id',$id)->first();
        return view ('admin.Xray.show',compact('xray'));
    }

    // Add new Diseases category
    Public function Xray_index()
    {
        return view ('admin.Xray.add');
    }

    public function Xray_store(Request $request)
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
        Xray::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,
            'code'=> $request->code,


        ]);
        return redirect('/xray/all')->with(['success'=> 'Xray added successfully']) ;
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
            'code.required' => 'Xray Code is required',



        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'ar_name' => 'required|max:50|unique:xray,ar_name',
            'en_name'=>'required|max:50|unique:xray,en_name' ,
            //'code'=>'required',

        ];
    }
    //delete Diseases category by id
    public function delete_Xray($id)
    {
        Xray::where('id',$id)->delete();
        return back()->with('Xray_delete','Xray Info has been deleted Succesfully');
    }

    //update program by id
    public function edit_Xray($id)
    {
        $xray =Xray::find($id);
        return view ('admin.Xray.edit',compact('xray'));
    }

    Public function update_Xray(Request $request)
    {
        $Xray = Xray::find($request->id);
        $Xray->en_name = $request->en_name;
        $Xray->ar_name = $request->ar_name;
        $Xray->code = $request->code;
        $Xray->save();
        return redirect('/xray/all')->with('success','Xray Information updated Successfully');
    }
}
