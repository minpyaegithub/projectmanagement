<?php

namespace App\Http\Controllers\member;

use App\ClientCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientCategoryController extends Controller
{
    public function index(){
        $data = ClientCategory::all();
        return view('backend.category.clientcategory')->with('data',$data);
    }

    public function add(Request $request){
        $data = new ClientCategory;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> ccategory_id = $request -> ccategory_id;
            $data -> name = $request -> ccategory_name;
            $data -> save();
        }else{
            $data = ClientCategory::find($id);
            $data -> ccategory_id = $request -> ccategory_id;
            $data -> name = $request -> ccategory_name;
            $data -> update();
        }

        return back()->with('success','Record Add Successfully');
    }

    public function view(Request $request){
        if ($request->ajax()){
            $id = $request -> id;
            $info = ClientCategory::find($id);
            return response()->json($info);
        }
    }

    public function select(Request $request){
        $id = $request -> id;
        $query = ClientCategory::where('ccategory_id','=',$id)->firstOrFail();
        return response()->json($query);
    }

    public function delete(Request $request){
        $id = $request -> id;
        $data = ClientCategory::find($id);
        $data -> delete();
    }
}
