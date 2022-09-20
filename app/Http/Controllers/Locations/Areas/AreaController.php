<?php

namespace App\Http\Controllers\Locations\Areas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    // Get All areas
    Public function areas_read()
    {
       $areas = Area::orderBy('id')->get();
        return view('admin.location.areas.areas',compact('areas'));
    }
    //show area Info By ID
    public function area_show($id)
    {
        $areas = Area::where('id',$id)->first();
        return view ('admin.location.areas.show',compact('areas'));
    }

    // Add new areas
    Public function areas_index()
    {
        $areas = Area::orderBy('id')->get();
        $districts=District::all();
        $cities=City::all();
        return view ('admin.location.areas.add',compact('areas','districts','cities'));
    }

    public function areas_store(Request $request)
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
        Area::Create([
            'ar_name' =>$request->ar_name,
            'en_name' => $request->en_name,
            'code' => $request->code,
            'district_id' =>$request->district_id,
            'city_id' =>$request->city_id,
        ]);
        return redirect('/locations/areas/all')->with(['success'=> 'area added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'code.required' => 'area code is required',
            'code.unique' => 'area code is already exsist',
            'ar_name.required' => 'Arabic Name is required',
            'ar_name.unique' => 'Arabic Name is already exsist',
            'en_name.required' => 'English Name is required',
            'en_name.unique' => 'English Name is already exsist',
            'district_id.unique' => 'District Name is already exsist',
            'city_id.unique' => 'City Name is already exsist',


        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'code' => 'required|unique:areas,code',
            'ar_name' => 'required|unique:areas,ar_name',
            'en_name' => 'required|unique:areas,en_name',
            'district_id' => 'required',
            'city_id' => 'required',

        ];
    }
    //delete area by id
    public function delete_area($id)
    {
        area::where('id',$id)->delete();
        return back()->with('area_delete','area Info has deleted Succesfully');
    }

    //update area by id
    public function edit_area($id)
    {
        $areas =area::find($id);
        $districts=District::all();
        $cities=City::all();
        return view ('admin.location.areas.edit',compact('areas','districts','cities'));
    }

    Public function update_area(Request $request)
    {
        $areas = Area::find($request->id);
        $areas->ar_name = $request->ar_name;
        $areas->en_name = $request->en_name;
        $areas->code = $request->code;
        $areas->district_id = $request->district_id;
        $areas->city_id = $request->city_id;
        $areas->save();
        return redirect('/locations/areas/all')->with('success','area Information updated Successfully');
    }
}
