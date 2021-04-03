<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Order;
use App\OrderItem;
use Auth;
use App\User;
use App\Area;
use Carbon\Carbon;
class OrderController extends Controller
{   
    public $logged_user_id;
    
    public function __construct()
    {
        // dd(Auth::user());
        // dd(Auth::check());
        // dd(Auth::check());
        // $this->middleware('guest')->except('logout');
        // $this->logged_user_id = Auth::id();
        // dd(Auth::user());
    }
    public function index(Request $request){
        $orders = Order::where("user_id",Auth::user()->id)
    ->with('area','order_items.product')
    ->get();
    // dd($orders);
    // ->toArray();
        foreach($orders as $order){
            // dd($order->created_at);
            $dt = Carbon::parse($order->created_at);
            // dd($dt->format(' jS \\of F Y h:i:s A'));
            foreach ($order->order_items as $order_item){
                // dd($order_item->product->name);
                
            }
        }
        return view('frontend.pages.orders',compact('orders'));
    }
    public function store(Request $request){
        // dd(Auth::user()->id);
        
        if(Auth::check()){
        $rules = array('address' => 'required|max:155', 'area_id' => 'required');
        $validator = Validator::make($request->all(), $rules);
        // Validate the input and return correct response
        if ($validator->fails())
        {
            return  response()->json(array(
                'success' => false,
                'errors' => $validator->errors()->all(),

            ), 400); // 400 being the HTTP code for an invalid request.
        }
        $identification_number = substr(str_shuffle(MD5(microtime())), 0, 10);
        $create_order =  Order::create([
            'user_id' => Auth::user()->id,
            'address' => $request->address,
            'area_id' => $request->area_id,
            'status' => 'placed',
            'identification_number' => $identification_number,
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
                    'user' => Auth::user(),
                   ]);
            }
             
         }
        else{
        return response()->json([
            'success'=> false,
            'message' => 'Failed! Something Went Wrong',
            'order' => $create_order,
           ]);
    } 
    }
}
}
