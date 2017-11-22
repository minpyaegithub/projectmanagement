<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        return view('backend.role')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $data = new Role;
        $id = $request -> edit_id;
        if ($id === '') {
            $data -> r_id = $request -> role_id;
            $data -> name = $request -> role_name;
            $data ->save();
        }else{
            $data = Role::find($id);
            $data -> r_id = $request -> role_id;
            $data -> name = $request -> role_name;
            $data -> update();
        }
        
       /* Role::create([
            'r_id'=>$request -> get('role_id'),
            'name'=>$request->get('role_name')]);*/
        return back() -> with('success','Save Successfully Sir!');
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Role::find($id);
            //echo json_decode($info);
            return  response()->json($info);
        }
    }

    public function select(Request $request)
    {
        $id = $request->id;
        $query = Role::where('r_id', '=', $id)->firstOrFail();
        return response()->json($query);
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Role::find($id);
        $response = $data -> delete();
        if($response)
            echo "Record Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
