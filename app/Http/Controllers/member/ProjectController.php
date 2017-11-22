<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function index(){
        $data = Project::all();
        return view('backend.project')->with('data',$data);
    }

    public function  add(Request $request){
        $data = new Project;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> p_id = $request -> project_id;
            $data -> name = $request -> project_name;
            $data -> save();
        }else{
            $data = Project::find($id);
            $data -> p_id = $request -> project_id;
            $data -> name = $request -> project_name;
            $data -> update();
        }

        return back()->with('success','Record Add Successfully');

    }
    public function select(Request $request){
        $id = $request -> id;
        $query = Project::where('p_id','=',$id)->firstOrFail();
        return response()->json($query);
    }
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Project::find($id);
            //echo json_decode($info);
            return  response()->json($info);
        }
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Project::find($id);
        $data -> delete();
    }
}
