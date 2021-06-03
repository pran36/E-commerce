<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
class ProductsController extends Controller
{
    public function index(){
        $products = products::latest()->get();
	    return view('home',['products'=>$products]);
    }
}
