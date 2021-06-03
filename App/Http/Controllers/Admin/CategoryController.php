<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Attribute;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::get();
        return view('Admin.Categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::get();
        return view('Admin.Categories.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|max:255|unique:categories',
            'category_desc' => 'required' 
        ],
    [
        'required'=>':attribute needs to be filled out',
        'category_name.required'=>'category name must be filled'
    ]);
        $slug = strtolower(str_replace(' ','-',$request->input('category_name')));
        $categories = category::whereSlug($slug)->get();
        if($categories->count()>0){
            return redirect()->back()->withErrors('Slug must be unique');
        }
        $category = new category;
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        $category->parent_id = $request->input('parent_id');
        $category->slug = $slug;
        if($category->save()){
            return redirect()->route('admin.categories.index');
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
    public function edit(category $category)
    {
        return view('Admin.Categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $validated = $request->validate([
            'category_name' => 'required|max:255',
            'category_desc' => 'required' 
        ],
    [
        'required'=>':attribute needs to be filled out',
        'category_name.required'=>'category name must be filled'
    ]);
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        if($category->save()){
            return redirect()->route('category_list');
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
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('category_list');
    }
}
