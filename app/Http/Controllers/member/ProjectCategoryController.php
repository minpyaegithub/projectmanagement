<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function index(){
        $data = ProjectCategory::all();
        return view('backend.category.projectcategory')->with('data',$data);
    }

    public function add(Request $request){
        $data = new ProjectCategory;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> pcategory_id = $request -> pcategory_id;
            $data -> name = $request -> pcategory_name;
            $data -> save();
        }else{
            $data = ProjectCategory::find($id);
            $data -> pcategory_id = $request -> pcategory_id;
            $data -> name = $request -> pcategory_name;
            $data -> update();
        }

        return back()->with('success','Record Add Successfully');
    }

    public function view(Request $request){
        if ($request->ajax()){
            $id = $request->id;
            $info = ProjectCategory::find($id);
            return response()->json($info);
        }
    }

    public function select(Request $request){
        $id = $request -> id;
        $query = ProjectCategory::where('pcategory_id','=',$id)->firstOrFail();
        return response()->json($query);
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = ProjectCategory::find($id);
        $data -> delete();
    }
}
