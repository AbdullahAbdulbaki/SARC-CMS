<?php

namespace App\Http\Controllers\UserManagement\Users;;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    // Get All users
    Public function users_read()
    {
        $users = User::orderBy('id')->get();
        return view('admin.UserManagement.Users.users',compact('users'));
    }
    //show user Info By ID
    public function user_show($id)
    {
        $users = User::where('id',$id)->first();
        return view ('admin.UserManagement.Users.show',compact('users'));
    }

    // Add new users
    Public function users_index()
    {
        $users = User::orderBy('id')->get();
        $roles=Role::all();
        return view ('admin.UserManagement.Users.add',compact('users','roles'));
    }

    public function users_store(Request $request)
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
        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/users/all')->with(['success'=> 'user added successfully']) ;
    }

    // Define Error Messages
    protected function getmessages()
    {
        return $messages =[
            'name.required' => 'user name is required',
            'email.required' => 'user email is required',
            'password.required' => 'user password is required',
            'email.unique' => 'email  is already exsist',
            'password.Min' => 'Password Must be at least 8 character',
        ];
    }

        //Define rules on Inputs
    protected function getrules()
    {
        return $rules =[
            'name' => 'required',
            'email'=> 'unique:users,email|email|required',
            'password' =>'Min:8|required',
        ];
    }
    //delete user by id
    public function delete_user($id)
    {
        User::where('id',$id)->delete();
        return back()->with('user_delete','user  has deleted Succesfully');
    }

    //update user by id
    public function edit_user($id)
    {
        $users =User::find($id);
        $roles=Role::all();

        return view ('admin.UserManagement.Users.edit',compact('users','roles'));
    }

    Public function update_user(Request $request)
    {
        $users = User::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->role_id = $request->role_id;
        $users->password =Hash::make($request['password']);
        $users->save();
        return redirect('/users/all')->with('success','User Information updated Successfully');
    }
}
