<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index(category $category){
        $products = $category -> products;
	    $categories = category::all();
	    return view('category',['products'=>$products,'category'=>$category,'categories'=>$categories]);
    }
}
