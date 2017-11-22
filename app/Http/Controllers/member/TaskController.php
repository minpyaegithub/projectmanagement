<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;

class TaskController extends Controller
{
    public function  index(){
        $data = Task::all();
        return view('backend.task')->with('data',$data);
    }
    public function add(Request $request){
        $data = new Task;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> t_id = $request -> task_id;
            $data -> name = $request -> task_name;
            $data -> save();
        }else {
            $data = Task::find($id);
            $data -> t_id = $request -> task_id;
            $data -> name = $request -> task_name;
            $data -> update();
        }

        return back()->with('success','Record Add Successfully');
    }

    public function select(Request $request){
        $id = $request -> id;
        $query = Task::where('t_id','=',$id)->firstOrFail();
        return response()->json($query);
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Task::find($id);
            //echo json_decode($info);
            return  response()->json($info);
        }
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Task::find($id);
        $data -> delete();
    }
}
