<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
class ProductsController extends Controller
{
    public function index(){
        $products = products::latest()->get();
        // $singleProduct = products::latest()->take(1)->get();
        $threeProduct = products::latest()->skip(1)->take(3)->get();
        $twoProduct = products::latest()->skip(4)->take(2)->get();
	    return view('home',['products'=>$products,'threeProduct'=>$threeProduct,'twoProduct'=>$twoProduct]);
    }
    public function show(products $product){
        return view('product',['product'=>$product]);
    }
    public function search(){
        
    }
}
