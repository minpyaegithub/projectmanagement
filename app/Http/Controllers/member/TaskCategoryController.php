<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaskCategory;

class TaskCategoryController extends Controller
{
    public function index(){
        $data = TaskCategory::all();
        return view('backend.category.taskcategory')->with('data',$data);
    }

    public function add(Request $request){
        $data = new TaskCategory;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> tcategory_id = $request -> tcategory_id;
            $data -> name = $request -> tcategory_name;
            $data -> save();
        }else{
            $data = TaskCategory::find($id);
            $data -> tcategory_id = $request -> tcategory_id;
            $data -> name = $request -> tcategory_name;
            $data -> update();
        }

        return back()->with('success','Record Add Successfully');
    }

    public function view(Request $request){
        if ($request->ajax()){
            $id = $request -> id;
            $info = TaskCategory::find($id);
            return response()->json($info);
        }
    }

    public function select(Request $request){
        $id = $request -> id;
        $query = TaskCategory::where('tcategory_id','=', $id)->firstOrFail();
        return response()-> json($query);
    }

    public function delete(Request $request){
        $id = $request -> id;
        $data = TaskCategory::find($id);
        $data -> delete();
    }
}
