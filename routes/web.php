<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\GoodsController;

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

Route::prefix('admin')->group(function (){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/products', AdminCategoryController::class);
    Route::resource('/orders', AdminCategoryController::class);
});

Route::get('/', [FrontController::class, 'homepage']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{slug}', [CategoryController::class, 'show']);

Route::get('/product/{slug}', [ProductsController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);
Route::put('/cart/{id}', [CartController::class, 'update']);
Route::delete('/cart/{id}', [CartController::class, 'delete']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/checkout/success', [CheckoutController::class, 'success']);

/*Route::controller(GoodsController::class)->group(function() {
    Route::get('/', 'GoodsView');
    Route::get('/categories/{slug}', 'categoryShow');
    Route::get('/products/{slug}', 'ProductView');
    Route::get('/cart', 'CartView');
    Route::get('/checkout', 'CheckoutView');
    Route::get('/checkout/success', 'SuccessCheckoutView');
});*/

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'AdminView');
    Route::post('/addproduct', 'AddProduct')->name('addproduct');
});

