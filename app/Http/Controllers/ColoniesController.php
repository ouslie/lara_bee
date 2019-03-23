<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Auth;

use App\Colonies;
use Illuminate\Http\Request;
use Redirect,Response;
 
class ColoniesController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    if(request()->ajax()) {
        return datatables()->of(Colonies::select('*')->where('user_id',Auth::id()))
        ->addColumn('action', 'colonies.action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }


    return view('colonies.list');
}
 
 
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{  
    $colony_id = $request->colony_id;
    $colony   =   Colonies::updateOrCreate( ['id' => $colony_id],
                                            [ 'user_id' => Auth::id(),
                                            'id_type' => $request->id_type,       
                                            'birthyear' => $request->birthyear,                                    
                                            ]       
                                            );        
    return Response::json($colony);
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
    $colony  = Colonies::where($where)->first();
 
    return Response::json($colony);
}
 
 
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $colony = Colonies::where('id',$id)->delete();
 
    return Response::json($colony);
}
}