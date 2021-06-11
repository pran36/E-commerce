<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\category;
use App\Models\user_reviews;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index(products $product){
        $category = category::get();
        $reviews = user_reviews::whereProductId($product->id)->latest()->get();
        return view('products',['product'=>$product,'categories'=>$category,'reviews'=>$reviews]);
    }
}
