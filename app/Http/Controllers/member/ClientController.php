<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public function index(){
        $data = Client::all();
        return view ('backend.client')->with('data',$data);
    }
    public function add(Request $request){
        $data = new Client;
        $id = $request -> edit_id;
        if ($id === '') {
            $data->c_id = $request-> client_id;
            $data->name = $request-> client_name;
            $data->save();
        }else{
            $data = Client::find($id);
            $data->c_id = $request-> client_id;
            $data->name = $request-> client_name;
            $data->update();
        }
        return back()->with('success','Record Add Successfully');
    }
    public function view(Request $request){
        if ($request->ajax()){
            $id = $request -> id;
            $info = Client::find($id);
            return response()->json($info);
        }
    }
    public function select(Request $request){
        $id = $request -> id;
        $query = Client::where('c_id','=',$id)->firstOrFail();
        return response()->json($query);
    }

    public function delete(Request $request){
        $id = $request -> id;
        $data = Client::find($id);
        $data -> delete();
    }
}
