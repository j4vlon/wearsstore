<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Admin\AdminProductsController;

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

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/products', AdminProductsController::class);
    Route::resource('/orders', OrdersController::class);
});

Route::get('/', [FrontController::class, 'homepage']);
Route::get('/shop', [FrontController::class, 'CategoryView']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{slug}', [CategoryController::class, 'show']);

//Route::get('/product/{slug}', [ProductsController::class, 'show']);

Route::get('/cart/{id}', [CartController::class, 'index']);
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.create');
Route::post('cart/delete/{id}', [CartController::class, 'deleteCartItem'])->name('delete.cartItem');

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/checkout/success', [CheckoutController::class, 'success']);

