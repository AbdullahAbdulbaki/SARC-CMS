<?php

namespace App\Http\Controllers\Programs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    // Get All Programs
    Public function programs_read()
    {
        $programs = DB::table('programs')->orderBy('id')->Paginate(10);
        return view('admin.programs.programs',compact('programs'));
    }
    //show Program Info By ID
    public function program_show($id)
    {
        $programs = Program::where('id',$id)->first();
        return view ('admin.programs.show',compact('programs'));
    }

    // Add new Programs
    Public function programs_index()
    {
        return view ('admin.programs.add');
    }

    public function programs_store(Request $request)
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
        Program::Create([
            'ar_name' => $request->ar_name,
            'en_name'=> $request->en_name,
            'description'=> $request->description,

        ]);
        return redirect('/programs/all')->with(['success'=> 'Program added successfully']) ;
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
            'description.required' => 'description  is required',


        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'ar_name' => 'required|max:50|unique:programs,ar_name',
            'en_name'=>'required|max:50|unique:programs,en_name' ,
            'description'=> 'required|max:200',
        ];
    }
    //delete program by id
    public function delete_program($id)
    {
        Program::where('id',$id)->delete();
        return back()->with('program_delete','Program Info has deleted Succesfully');
    }

    //update program by id
    public function edit_program($id)
    {
        $programs =Program::find($id);
        return view ('admin.programs.edit',compact('programs'));
    }

    Public function update_program(Request $request)
    {
        $programs = Program::find($request->id);
        $programs->en_name = $request->en_name;
        $programs->ar_name = $request->ar_name;
        $programs->description = $request->description;
        $programs->save();
        return redirect('/programs/all')->with('success','Program Information updated Successfully');
    }
}
