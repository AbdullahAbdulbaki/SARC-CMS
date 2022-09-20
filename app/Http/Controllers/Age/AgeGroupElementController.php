<?php

namespace App\Http\Controllers\Age;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agegroupelement;
use App\Models\Agecategorygroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AgeGroupElementController extends Controller
{
    // Get All Diseases category
    Public function Agegroupelement_read()
    {
        $Agegroupelement = Agegroupelement::orderBy('id')->get();
        return view('admin.Age.groupelement.index',compact('Agegroupelement'));
    }
    //show Diseases category Info By ID
    public function Agegroupelement_show($id)
    {
        $Agecategorygroup=Agecategorygroup::all();
        $Agegroupelement = Agegroupelement::where('id',$id)->first();
        return view ('admin.Age.groupelement.show',compact('Agegroupelement','Agecategorygroup'));
    }

    // Add new Diseases category
    Public function Agegroupelement_index()
    {
        $Agecategorygroup=Agecategorygroup::all();
        return view ('admin.Age.groupelement.add',compact('Agecategorygroup'));
    }

    public function Agegroupelement_store(Request $request)
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
        Agegroupelement::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,
            'group_id'=> $request->group_id,
            'from'=>$request->from,
            'to'=>$request->to,
            'index'=>$request->index,


        ]);
        return redirect('/Agegroupelement/all')->with(['success'=> 'Age Group Element added successfully']) ;
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
            'group_id.required' => 'Group name is required',
            'from.required' => 'Minimum Age is required',
            'to.required' => 'Maximum Age is required',
            'index.required' => 'Index of Group Element is required',



        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'ar_name' => 'required|max:50|unique:Agegroupelements,ar_name',
            'en_name'=>'required|max:50|unique:Agegroupelements,en_name' ,
            'group_id' =>'required',
            'from' =>'required',
            'to' =>'required',
            'index' =>'required',
        ];
    }
    //delete Diseases category by id
    public function delete_Agegroupelement($id)
    {
        Agegroupelement::where('id',$id)->delete();
        return back()->with('Agegroupelement_delete','Age Group Element Info has deleted Succesfully');
    }

    //update program by id
    public function edit_Agegroupelement($id)
    {
        $Agecategorygroup = Agecategorygroup::get();
        $Agegroupelement =Agegroupelement::find($id);
        return view ('admin.Age.groupelement.edit',compact('Agegroupelement','Agecategorygroup'));
    }

    Public function update_Agegroupelement(Request $request)
    {
        $Agegroupelement = Agegroupelement::find($request->id);
        $Agegroupelement->en_name = $request->en_name;
        $Agegroupelement->ar_name = $request->ar_name;
        $Agegroupelement->group_id = $request->group_id;
        $Agegroupelement->from = $request->from;
        $Agegroupelement->to = $request->to;
        $Agegroupelement->index = $request->index;
        $Agegroupelement->save();
        return redirect('/Agegroupelement/all')->with('success','Age Group Element Information updated Successfully');
    }
}
