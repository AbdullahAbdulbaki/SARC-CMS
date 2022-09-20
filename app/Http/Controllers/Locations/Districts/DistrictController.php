<?php

namespace App\Http\Controllers\Locations\Districts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class districtController extends Controller
{
    // Get All districts
    Public function districts_read()
    {
       $districts = district::orderBy('id')->get();
        return view('admin.location.districts.districts',compact('districts'));
    }
    //show district Info By ID
    public function district_show($id)
    {
        $districts = district::where('id',$id)->first();
        return view ('admin.location.districts.show',compact('districts'));
    }

    // Add new districts
    Public function districts_index()
    {
        $districts = District::orderBy('id')->get();
        $regions=Region::all();
        return view ('admin.location.districts.add',compact('districts','regions'));
    }

    public function districts_store(Request $request)
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
        district::Create([
            'ar_name' =>$request->ar_name,
            'en_name' => $request->en_name,
            'code' => $request->code,
            'region_id' =>$request->region_id,
        ]);
        return redirect('/locations/districts/all')->with(['success'=> 'district added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'code.required' => 'district code is required',
            'code.unique' => 'district code is already exsist',
            'ar_name.required' => 'Arabic Name is required',
            'ar_name.unique' => 'Arabic Name is already exsist',
            'en_name.required' => 'English Name is required',
            'en_name.unique' => 'English Name is already exsist',
            'region_id.unique' => 'City Name is already exsist',


        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'code' => 'required|unique:districts,code',
            'ar_name' => 'required|unique:districts,ar_name',
            'en_name' => 'required|unique:districts,en_name',
            'region_id' => 'required',

        ];
    }
    //delete district by id
    public function delete_district($id)
    {
        district::where('id',$id)->delete();
        return back()->with('district_delete','district Info has deleted Succesfully');
    }

    //update district by id
    public function edit_district($id)
    {
        $districts =district::find($id);
        $regions=Region::all();
        return view ('admin.location.districts.edit',compact('districts','regions'));
    }

    Public function update_district(Request $request)
    {
        $districts = district::find($request->id);
        $districts->ar_name = $request->ar_name;
        $districts->en_name = $request->en_name;
        $districts->code = $request->code;
        $districts->region_id = $request->region_id;
        $districts->save();
        return redirect('/locations/districts/all')->with('success','district Information updated Successfully');
    }
}
