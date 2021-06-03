<?php

use App\Http\Controllers\Admin\ProductsController as AdminProductsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Models\products;
use App\Models\category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/products', function () {
	$products = products::all();
    return view('product',['products'=>$products]);
});
Route::get('/product/{product}', function (products $product) { //get directly
	//$product = products::find($id);
    return view('products',['product'=>$product]);
});
Route::get('/create_product',function(){
	products::create(
		[
			'product_name'=> 'laptop',
			'product_desc' => 'this is a good laptop',
			'price'=>10000,
			'image'=>' ',		]
	);
});
Route::get('/get_product',function(){
	$products = products::get();
	return $products;
});
Route::get('/create_category',function(){
	category::create(
		[
			'category_name'=>'mobile phones',
			'category_desc'=>'mobile phones consist of smart phone and I-phones',
		]
		);
});
Route::get('/categories/{category}',[CategoryController::class,'index']);

Route::get('/sidebar',function(){
	$category = category::all();
	return view('sidebar',['category'=>$category]);
});
// Route::get('/',function(){
// 	return view('welcome');
// });
Route::get('/',[ProductsController::class,'index']);

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
	Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
	//Admin Routing	
	Route::resource('products',AdminProductsController::class);
	Route::resource('categories',AdminCategoryController::class);
});
Route::get('test',function(){
    return App\Models\Category::with('children')->where('parent_id',1)->get();
});