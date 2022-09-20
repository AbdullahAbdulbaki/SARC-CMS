<?php

namespace App\Http\Controllers\Locations\Cities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    // Get All cities
    Public function cities_read()
    {
        $cities = DB::table('cities')->orderBy('id')->get();
        return view('admin.location.cities.cities',compact('cities'));
    }
    //show city Info By ID
    public function city_show($id)
    {
        $cities = City::where('id',$id)->first();
        return view ('admin.location.cities.show',compact('cities'));
    }

    // Add new cities
    Public function cities_index()
    {
        return view ('admin.location.cities.add');
    }

    public function cities_store(Request $request)
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
        city::Create([
            'ar_name' =>$request->ar_name,
            'en_name' => $request->en_name,
            'code' => $request->code,
        ]);
        return redirect('/locations/cities/all')->with(['success'=> 'city added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'code.required' => 'city code is required',
            'code.unique' => 'city code is already exsist',
            'ar_name.required' => 'Arabic Name is required',
            'ar_name.unique' => 'Arabic Name is already exsist',
            'en_name.required' => 'English Name is required',
            'en_name.unique' => 'English Name is already exsist',
        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'code' => 'required|unique:cities,code',
            'ar_name' => 'required|unique:cities,ar_name',
            'en_name' => 'required|unique:cities,en_name',
        ];
    }
    //delete city by id
    public function delete_city($id)
    {
        City::where('id',$id)->delete();
        return back()->with('city_delete','city Info has deleted Succesfully');
    }

    //update city by id
    public function edit_city($id)
    {
        $cities =city::find($id);
        return view ('admin.location.cities.edit',compact('cities'));
    }

    Public function update_city(Request $request)
    {
        $cities = city::find($request->id);
        $cities->ar_name = $request->ar_name;
        $cities->en_name = $request->en_name;
        $cities->code = $request->code;
        $cities->save();
        return redirect('/locations/cities/all')->with('success','city Information updated Successfully');
    }
}
