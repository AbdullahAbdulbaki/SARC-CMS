<?php

namespace App\Http\Controllers\Locations\Types;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LocationType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LocationTypesController extends Controller
{
    // Get All Location Type
    Public function read()
    {
        $location_types = LocationType::orderBy('id')->get();
        return view('admin.location.LocationType.location_types',compact('location_types'));

    }
    //show Program Info By ID
    public function show($id)
    {
        $location_types = LocationType::where('id',$id)->first();
        return view ('admin.location.locationType.show',compact('location_types'));
    }

    // Add new Location Type
    Public function index()
    {
        return view ('admin.Location.locationType.add');
    }

    public function store(Request $request)
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
        LocationType::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,


        ]);
        return redirect('/locations/types/all')->with(['success'=> 'Location Type added successfully']) ;
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
            'ar_name' => 'required|max:50|unique:locationtypes,ar_name',
            'en_name'=>'required|max:50|unique:locationtypes,en_name' ,

        ];
    }
    //delete program by id
    public function delete($id)
    {
        LocationType::where('id',$id)->delete();
        return back()->with('locationtype_delete','Location Type Info has deleted Succesfully');
    }

    //update program by id
    public function edit($id)
    {
        $location_types =LocationType::find($id);
        return view ('admin.Location.locationType.edit',compact('location_types'));
    }

    Public function update(Request $request)
    {
        $location_types = LocationType::find($request->id);
        $location_types->en_name = $request->en_name;
        $location_types->ar_name = $request->ar_name;
        $location_types->save();
        return redirect('/locations/types/all')->with('success','Program Information updated Successfully');
    }
}
