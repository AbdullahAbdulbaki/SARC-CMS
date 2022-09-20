<?php

namespace App\Http\Controllers\UserManagement\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    // Get All roles
    Public function roles_read()
    {
        $roles = DB::table('roles')->orderBy('id')->get();
        return view('admin.UserManagement.Roles.roles',compact('roles'));
    }
    //show role Info By ID
    public function role_show($id)
    {
        $roles = Role::where('id',$id)->first();
        return view ('admin.UserManagement.Roles.show',compact('roles'));
    }

    // Add new roles
    Public function roles_index()
    {
        return view ('admin.UserManagement.Roles.add');
    }

    public function roles_store(Request $request)
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
        Role::Create([
            'name' => $request->name,
        ]);
        return redirect('/roles/all')->with(['success'=> 'role added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'name.required' => 'role name is required',
            'name.unique' => 'role name is already exsist',
        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'name' => 'required|unique:roles,name',
        ];
    }
    //delete role by id
    public function delete_role($id)
    {
        Role::where('id',$id)->delete();
        return back()->with('role_delete','role Info has deleted Succesfully');
    }

    //update role by id
    public function edit_role($id)
    {
        $roles =Role::find($id);
        return view ('admin.UserManagement.Roles.edit',compact('roles'));
    }

    Public function update_role(Request $request)
    {
        $roles = Role::find($request->id);
        $roles->name = $request->name;
        $roles->save();
        return redirect('/roles/all')->with('success','role Information updated Successfully');
    }
}
