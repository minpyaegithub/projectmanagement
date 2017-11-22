<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $roles = Role::all();
        return view('backend.users.index',compact('users','roles'));
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = User::find($id);
            return  response()->json($info);
        }
    }

    public function edit($id){
        $user=User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();
        return view('backend.users.edit',compact('user','roles','selectedRoles'));
    }

    public function update(request $request,$id){
        $user = User::whereId($id)->firstOrFail();
        $role = Role::all();
        $user->name= $request->get('username');
        $user->email= $request->get('email');
        $user->syncRoles($request->get('role'));
        $user->update();
        return redirect(action('admin\UserController@edit',$id))->with('status','Successfully Update User');

    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = User::find($id);
        $data -> delete();
    
    }
}
