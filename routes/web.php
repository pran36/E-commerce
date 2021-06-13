<?php

use App\Http\Controllers\Admin\ProductsController as AdminProductsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\UserReviewsController;
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
Route::get('/product/{product}', [SingleProductController::class,'index']);

Route::get('/categories/{category}',[CategoryController::class,'index']);

Route::get('/',[ProductsController::class,'index'])->name('home');
// Route::get('/product/search',[ProductsController::class,'search'])->name('products.search');

//Searching Routes
Route::get('/search',[SearchController::class,'search'])->name('search');

//cart route
Route::resource('order',OrderController::class);
Route::resource('cart',OrderItemController::class)->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
	Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
	//Admin Routing	
	Route::resource('products',AdminProductsController::class);
	Route::resource('categories',AdminCategoryController::class);
	Route::resource('users',UserController::class);
	Route::resource('orders',AdminOrderController::class);
	Route::resource('reports',ReportsController::class);
});
Route::middleware(['auth'])->group(function(){
	Route::resource('reviews',UserReviewsController::class);
	Route::resource('checkout',CheckoutController::class);
});