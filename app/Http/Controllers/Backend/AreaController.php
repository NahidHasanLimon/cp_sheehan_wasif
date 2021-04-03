<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Area;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $areas = Area::all();
        return view('backend.pages.area',compact('areas'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('name' => 'required|max:155|unique:areas');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        
        $create_area =  Area::create([
            
            'name' => $request->name,
        ]);
        if ($create_area) {
            return response()->json([
                'success'=> true,
                'message' => 'Area Created Successfully',
                'area' => $create_area,
               ]);
        }
        return response()->json([
            'success'=> false,
            'message' => 'Something Went Wrong',
           ]);
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
    public function edit(Request $request)
    {
        $rules = array('id' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        $find_area = Area::find($request->id);
        if ($find_area) {
            return response()->json([
                'success'=> true,
                'area' => $find_area,
               ]);
        }
        return response()->json([
            'success'=> false,
            'message' => 'Failed to Find',
           ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $rules = array('name' =>  'unique:areas,name,' . $request->id,'id' =>'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        $area = Area::find($request->id);
        $area->name = $request->name;
        $update_area = $area->save();
       if ($update_area) {
        return response()->json([
            'success'=> true,
            'message' => 'Updated Successfully',
            'area' => $area
           ]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rules = array('id' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        $find_area = Area::find($request->id);
        if ($find_area) {
            $delete_area = $find_area->delete();
        if($delete_area){
            return response()->json([
                'success'=> true,
                'message' => 'Area Deleted Successfully',
               ]);
        }
    }
    return response()->json([
        'success'=> false,
        'message' => 'Failed to Delete',
       ]);
        
    }
}
