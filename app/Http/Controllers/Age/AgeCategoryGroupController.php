<?php

namespace App\Http\Controllers\Age;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agecategorygroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AgeCategoryGroupController extends Controller
{
    // Get All Diseases category
    Public function Agecategorygroup_read()
    {
        $Agecategorygroup = Agecategorygroup::orderBy('id')->get();
        return view('admin.Age.categorygroup.index',compact('Agecategorygroup'));
    }
    //show Diseases category Info By ID
    public function Agecategorygroup_show($id)
    {
        $Agecategorygroup = Agecategorygroup::where('id',$id)->first();
        return view ('admin.Age.categorygroup.show',compact('Agecategorygroup'));
    }

    // Add new Diseases category
    Public function Agecategorygroup_index()
    {
        return view ('admin.Age.categorygroup.add');
    }

    public function Agecategorygroup_store(Request $request)
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
        Agecategorygroup::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,


        ]);
        return redirect('/Agecategorygroup/all')->with(['success'=> 'Age Category Group added successfully']) ;
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
            'ar_name' => 'required|max:50|unique:Agecategorygroups,ar_name',
            'en_name'=>'required|max:50|unique:Agecategorygroups,en_name' ,


        ];
    }
    //delete Diseases category by id
    public function delete_Agecategorygroup($id)
    {
        Agecategorygroup::where('id',$id)->delete();
        return back()->with('Agecategorygroup_delete','Age Category Group Info has deleted Succesfully');
    }

    //update program by id
    public function edit_Agecategorygroup($id)
    {
        $Agecategorygroup =Agecategorygroup::find($id);
        return view ('admin.Age.categorygroup.edit',compact('Agecategorygroup'));
    }

    Public function update_Agecategorygroup(Request $request)
    {
        $Agecategorygroup = Agecategorygroup::find($request->id);
        $Agecategorygroup->en_name = $request->en_name;
        $Agecategorygroup->ar_name = $request->ar_name;
    
        $Agecategorygroup->save();
        return redirect('/Agecategorygroup/all')->with('success','Age Category Group Information updated Successfully');
    }
}
