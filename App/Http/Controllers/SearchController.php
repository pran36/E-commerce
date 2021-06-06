<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        // return request(['search','category']);
        $products = products::latest()->search(request(['search','category']))->get();
        $categories = category::all();
        
        return view('product',['products'=>$products,'categories'=>$categories]);
    }
}
