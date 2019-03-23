<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Auth;

use App\Hives;
use Illuminate\Http\Request;
use Redirect,Response;
 
class HivesController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    if(request()->ajax()) {
        return datatables()->of(Hives::select('*')->where('user_id',Auth::id()))
        ->addColumn('action', 'hives.action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }


    return view('hives.list');
}
 
 
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{  
    $hive_id = $request->hive_id;
    $user   =   Hives::updateOrCreate(  ['id' => $hive_id],
                                        ['user_id' => Auth::id(),
                                        'name' => $request->name, 'frame' => $request->frame]);        
    return Response::json($user);
}
 
 
/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{   
    $where = array('id' => $id);
    $hive  = Hives::where($where)->first();
 
    return Response::json($hive);
}
 
 
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $hive = Hives::where('id',$id)->delete();
 
    return Response::json($hive);
}
}