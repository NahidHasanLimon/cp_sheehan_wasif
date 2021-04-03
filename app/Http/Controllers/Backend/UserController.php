<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Area;
use App\User;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('backend.pages.user',compact('users'));
    
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
        $rules = array('email' => 'required|max:155|unique:users','full_name' => 'required|max:155','phone_number' => 'required|max:155|unique:users');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        
        $create_user =  User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);
        if ($create_user) {
            return response()->json([
                'success'=> true,
                'message' => 'Area Created Successfully',
                'user' => $create_user->refresh(),
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
        $find_user = User::find($request->id);
        if ($find_user) {
            return response()->json([
                'success'=> true,
                'user' => $find_user,
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
        $rules = array('email' =>  'unique:users,email,' . $request->id,
            'id' =>'required',
            'phone_number' =>  'unique:users,phone_number,' . $request->id,
            // 'password' =>'required',
            'full_name' =>'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        $user = User::find($request->id);
        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $update_user = $user->save();
       if ($update_user) {
        return response()->json([
            'success'=> true,
            'message' => 'Updated Successfully',
            'user' => $user
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
        $find_user = User::find($request->id);
        if ($find_user) {
            $delete_user = $find_user->delete();
        if($delete_user){
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
    public function is_admin_status_change(Request $request){
        $rules = array('id' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        $find_user = User::find($request->id);
        if ($find_user) {
            if($find_user->is_admin==!$request->isadminstatus){
                return response()->json([
                    'success'=> true,
                    'is_changed' => false,
                    'message' => 'No need to change',
                   ]);
            }else{
                // $change_status = $find_user->delete();
                $find_user->is_admin = !$request->isadminstatus;
                $find_user->save();
                return response()->json([
                    'success'=> true,
                    'is_changed' => true,
                    'message' => 'Changed Successfully',
                    'user'=>$find_user,
                   ]);
           
        }
    }
}
}
