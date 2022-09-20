<?php

namespace App\Http\Controllers\Donors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DonorController extends Controller
{
    // Get All Donors
    Public function donors_read()
    {
        $donors = DB::table('donors')->orderBy('id')->get();
        return view('admin.donors.donors',compact('donors'));
    }
    //show Donor Info By ID
    public function donor_show($id)
    {
        $donors = Donor::where('id',$id)->first();
        return view ('admin.donors.show',compact('donors'));
    }

    // Add new Donors
    Public function donors_index()
    {
        return view ('admin.donors.add');
    }

    public function donors_store(Request $request)
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
        Donor::Create([
            'code' => $request->code,
        ]);
        return redirect('/donors/all')->with(['success'=> 'Donor added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'code.required' => 'Donor code is required',
            'code.unique' => 'Donor code is already exsist',
        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'code' => 'required|unique:donors,code',
        ];
    }
    //delete Donor by id
    public function delete_donor($id)
    {
        Donor::where('id',$id)->delete();
        return back()->with('donor_delete','Donor Info has deleted Succesfully');
    }

    //update Donor by id
    public function edit_donor($id)
    {
        $donors =Donor::find($id);
        return view ('admin.donors.edit',compact('donors'));
    }

    Public function update_donor(Request $request)
    {
        $donors = Donor::find($request->id);
        $donors->code = $request->code;
        $donors->save();
        return redirect('/donors/all')->with('success','Donor Information updated Successfully');
    }
}
