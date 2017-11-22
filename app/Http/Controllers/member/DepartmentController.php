<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index(){
        $data = Department::all();
        return view('backend.department')->with('data',$data);
    }

    public function add(Request $request){
        $data = new Department;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> d_id = $request -> department_id;
            $data -> name = $request -> department_name;
            $data -> save();
        }else{
            $data = Department::find($id);
            $data -> d_id = $request -> department_id;
            $data -> name = $request -> department_name;
            $data -> update();
        }
        return back()->with('success','Record Add Successfully');
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Department::find($id);
            //echo json_decode($info);
            return  response()->json($info);
        }
    }

    public function select(Request $request)
    {
        $id = $request->id;
        $query = Department::where('d_id', '=', $id)->firstOrFail();
        return response()->json($query);
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Department::find($id);
        $data -> delete();
    }
}
