<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Area;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        $areas = Area::all();
        // dd($products);
        return view('frontend.pages.home',compact('products','areas'));
    }
}
