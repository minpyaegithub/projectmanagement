<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use Spatie\Permission\Models\Role;
use App\Department;

class EmployeeController extends Controller
{
    public function index(Request $request){
        $data = Employee::all();
        $roles = Role::all();
        $departments = Department::all();
        /*$id = $request -> id;
        var_dump($id);
        echo $id;
        $one = Employee::find($id);
        /*var_dump($one);*/
        return view('backend.employee',compact('roles','data','departments'));
    }


    public function add(Request $request){
        $data = new Employee;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> e_id = $request -> employee_id;
            $data -> name = $request -> employee_name;
            $data -> remark = $request -> remark;
            $data -> department_id = $request -> department;
            $data -> role_id = $request -> position;
            $data -> save();
        }else{
            $data = Employee::find($id);
            $data -> e_id = $request -> employee_id;
            $data -> name = $request -> employee_name;
            $data -> remark = $request -> remark;
            $data -> department_id = $request -> department;
            $data -> role_id = $request -> position;
            $data -> update();
        }
        return back()->with('success','Record Add Successfully');
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Employee::find($id);
            $info->department;
            $info->role;
            return  response()->json($info);
        }
    }

    public function select(Request $request)
    {
        $id = $request->id;
        $query = Employee::where('e_id', '=', $id)->firstOrFail();
        return response()->json($query);
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Employee::find($id);
        $data -> delete();
    }
}
