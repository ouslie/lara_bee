<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Auth;

use App\Apiaries;
use Illuminate\Http\Request;
use Redirect,Response;
 
class ApiariesController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

public function index()
{
    if(request()->ajax()) {
        return datatables()->of(Apiaries::select('*')->where('user_id',Auth::id()))
        ->addColumn('action', 'hives.action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }


    return view('apiaries.list');
}
 
 
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{  
    $apiary_id = $request->apiary_id;
    $apiary   =   Apiaries::updateOrCreate(  ['id' => $apiary_id],
                                        ['user_id' => Auth::id(),
                                        'name' => $request->name, 'address' => $request->address]);        
    return Response::json($apiary);
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
    $apiary  = Apiaries::where($where)->first();
 
    return Response::json($apiary);
}
 
 
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $apiary = Apiaries::where('id',$id)->delete();
 
    return Response::json($apiary);
}
}