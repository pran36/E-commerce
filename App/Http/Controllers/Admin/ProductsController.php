<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::latest()->get();
        return view('Admin.Products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = category::all();
        $categories = category::with('children')->where('parent_id',0)->get();
        return view('Admin.Products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'product_name'=>'required|max:255',
            'product_desc'=>'required',
            'price'=>'required',
            'category_id'=>'required|integer|min:1'
        ],
        [
            'required'=>':attribute is required',
            'product_name.required' => 'Product Name is Required. Please input it'
        ]
        );
        // return $request;
        $products = new products;
        $products->product_name = $request->input('product_name');
        $products->product_desc = $request->input('product_desc');
        $products->price = $request->input('price');
        $products->category_id = $request->input('category_id');
        if($request->hasFile('image_upload')){
            // return $products;
            $name = $request->file('image_upload')->getClientOriginalName();
            $request->file('image_upload')->storeAs('public/images',$name);
            // image_crop($products->image);
            // $image_resize=Image::make(storage_path('app/public/images/'.$name),
            // $image_resize->resize(550,750);
            // $image_resize->save(storage_path('app/public/images/thumbnail/'.$name)),
            $products->image = $name;
        }
        else{
            $products->image = 'vayena';
            return $products;
        }
        // return $products;
        if($products->save()){
            return redirect()->route('admin.products.index');
        }
        else{
            return redirect()->back();
        }
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
    public function edit(products $product)
    {
        $categories = category::all();
        return view('Admin.Products.edit',['categories'=>$categories,'products'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $product)
    {
        // return $request;
        // $products = products::find($products->id);
        // return $product;
        $product->product_name = $request->input('product_name');
        $product->product_desc = $request->input('product_desc');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->image = ' ';
        if($product->save()){
            return redirect()->route('admin.products.index');
        }
        else{
            return redirect()->back();
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $product)
    {
        $product -> delete();
        return redirect()->route('admin.products.index');
    }
}
