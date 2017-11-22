<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Department;
use App\Project;
use App\User;
use App\Work;

class WorkController extends Controller
{
    public function index(){
        $data = Work::all();
        $users = User::all();
        $roles = Role::all();
        $departments = Department::all();
        $projects = Project::all();
        return view('backend.work',compact('data','users','roles','departments','projects'));
    }

    public function add(Request $request){
        $data = new Work;
        /*$data -> date = date('Y-m-d', strtotime(str_replace('-', '/', $request['date'])));*/
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> date = $request -> date;
            $data -> user_id = $request -> username;
            $data -> role_id = $request -> position;
            $data -> department_id = $request -> department;
            $data -> project_id = $request -> project;
            $data -> description = $request -> description;
            $data -> save();
        }else{
            $data = Work::find($id);
            $data -> date = $request -> date;
            $data -> user_id = $request -> username;
            $data -> role_id = $request -> position;
            $data -> department_id = $request -> department;
            $data -> project_id = $request -> project;
            $data -> description = $request -> description;
            $data -> update();
        }

        return back()->with('success','Record Add Successfully');
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Work::find($id);
            $info->user;
            $info->role;
            $info->department;
            $info->project;
            return  response()->json($info);
        }
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Work::find($id);
        $data -> delete();
    }
}
