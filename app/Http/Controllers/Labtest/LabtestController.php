<?php

namespace App\Http\Controllers\Labtest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Labtest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LabtestController extends Controller
{
    // Get All Diseases category
    Public function Labtest_read()
    {
        $Labtest = Labtest::orderBy('id')->get();
        return view('admin.Labtest.Labtest',compact('Labtest'));
    }
    //show Diseases category Info By ID
    public function Labtest_show($id)
    {
        $Labtest = Labtest::where('id',$id)->first();
        return view ('admin.Labtest.show',compact('Labtest'));
    }

    // Add new Diseases category
    Public function Labtest_index()
    {
        return view ('admin.Labtest.add');
    }

    public function Labtest_store(Request $request)
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
        Labtest::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,
            'code'=> $request->code,


        ]);
        return redirect('/labtest/all')->with(['success'=> 'Labtest added successfully']) ;
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
            'ar_name' => 'required|max:50|unique:labtest,ar_name',
            'en_name'=>'required|max:50|unique:labtest,en_name' ,
            //'code'=>'required',

        ];
    }
    //delete Diseases category by id
    public function delete_Labtest($id)
    {
        Labtest::where('id',$id)->delete();
        return back()->with('Labtest_delete','Labtest Info has deleted Succesfully');
    }

    //update program by id
    public function edit_Labtest($id)
    {
        $Labtest =Labtest::find($id);
        return view ('admin.Labtest.edit',compact('Labtest'));
    }

    Public function update_Labtest(Request $request)
    {
        $Labtest = Labtest::find($request->id);
        $Labtest->en_name = $request->en_name;
        $Labtest->ar_name = $request->ar_name;
        $Labtest->code = $request->code;
        $Labtest->save();
        return redirect('/labtest/all')->with('success','Labtest Information updated Successfully');
    }
}
