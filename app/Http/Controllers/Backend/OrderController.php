<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\User;
use App\Area;
use App\Product;
use Hash;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::with('area','order_items.product')->get();
        $users = User::all();
        $products = Product::all();
        $areas = Area::all();
        return view('backend.pages.order',compact('orders','users','products','areas'));
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
        $customer_id =$request->user_id;
        $rules = array('area_id' => 'max:10',
            'address' => 'max:10','product_id' => 'max:10',
            'quantity' => 'required|numeric',
            'user_id' => 'required|max:10|numeric');
        if (isset($request->is_new_customer)){
         $rules = array('area_id' => 'max:10',
            'address' => 'max:10',
            'product_id' => 'max:10',
            'quantity' => 'required|numeric',
            'user_id' => 'required|max:10|numeric',
            'email' => 'max:155|unique:users',
            'full_name' => 'required|max:155',
            'phone_number' => 'required|numeric');
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400);
        }
        if (isset($request->is_new_customer)){
        $create_user =  User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);
        $customer_id = $create_user->id;
        }
        $create_order = Order::create([
            
            'user_id' => $customer_id,
            'area_id' => $request->area_id,
            'address' => $request->address,
            'status' => $request->status,
            'date' => now(),
        ]);
        if ($create_order) {
            $create_orderItem =  OrderItem::create([
                'order_id' => $create_order->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
            if($create_orderItem){
                return response()->json([
                    'success'=> true,
                    'message' => 'Order Placed Successfully',
                    'order' => $create_order,
                   ]);
            }
             
         }
         return response()->json([
            'success'=> false,
            'message' => 'Failed to add',
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
    public function update(Request $request, $id)
    {
        //
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
        $find_order = Order::find($request->id);
        if ($find_order) {
            $delete_related_order_items = $find_order->order_items()->delete();
            $delete_order = $find_order->delete();
        if($delete_order){
            return response()->json([
                'success'=> true,
                'message' => 'Order Deleted Successfully',
               ]);
        }
    }
    return response()->json([
        'success'=> false,
        'message' => 'Failed to Delete',
       ]);
    }
    public function change_order_status(Request $request){
        // dd($request->all());
        $rules = array('id' => 'required','status'=>'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),
            ), 400);
        }
        $find_order = Order::find($request->id);
        if ($find_order) {
            if($find_order->status==$request->status){
                return response()->json([
                    'success'=> true,
                    'is_changed' => false,
                    'message' => 'Allready Same Status Belongs',
                   ]);
            }else{
                // $change_status = $find_order->delete();
                $find_order->status = $request->status;
                $find_order->save();
                return response()->json([
                    'success'=> true,
                    'is_changed' => true,
                    'message' => 'Changed Successfully',
                    'user'=>$find_order,
                   ]);
           
        }
    }
    }
}
