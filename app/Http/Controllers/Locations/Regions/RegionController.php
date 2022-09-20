<?php

namespace App\Http\Controllers\Locations\Regions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    // Get All regions
    Public function regions_read()
    {
       $regions = Region::orderBy('id')->get();
        return view('admin.location.Regions.regions',compact('regions'));
    }
    //show region Info By ID
    public function region_show($id)
    {
        $regions = Region::where('id',$id)->first();
        return view ('admin.location.Regions.show',compact('regions'));
    }

    // Add new regions
    Public function regions_index()
    {
        $regions = Region::orderBy('id')->get();
        $cities=City::all();
        return view ('admin.location.Regions.add',compact('regions','cities'));
    }

    public function regions_store(Request $request)
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
        Region::Create([
            'ar_name' =>$request->ar_name,
            'en_name' => $request->en_name,
            'code' => $request->code,
            'city_id' =>$request->city_id,
        ]);
        return redirect('/locations/regions/all')->with(['success'=> 'region added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'code.required' => 'region code is required',
            'code.unique' => 'region code is already exsist',
            'ar_name.required' => 'Arabic Name is required',
            'ar_name.unique' => 'Arabic Name is already exsist',
            'en_name.required' => 'English Name is required',
            'en_name.unique' => 'English Name is already exsist',
            'city_id.unique' => 'City Name is already exsist',


        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'code' => 'required|unique:regions,code',
            'ar_name' => 'required|unique:regions,ar_name',
            'en_name' => 'required|unique:regions,en_name',
            'city_id' => 'required',

        ];
    }
    //delete region by id
    public function delete_region($id)
    {
        Region::where('id',$id)->delete();
        return back()->with('region_delete','region Info has deleted Succesfully');
    }

    //update region by id
    public function edit_region($id)
    {
        $regions =Region::find($id);
        $cities=City::all();
        return view ('admin.location.regions.edit',compact('regions','cities'));
    }

    Public function update_region(Request $request)
    {
        $regions = Region::find($request->id);
        $regions->ar_name = $request->ar_name;
        $regions->en_name = $request->en_name;
        $regions->code = $request->code;
        $regions->city_id = $request->city_id;
        $regions->save();
        return redirect('/locations/regions/all')->with('success','region Information updated Successfully');
    }
}
