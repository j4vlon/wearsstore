<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductsController;

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
//    Route::get('/dashboard', [DashboardController::class, 'index']);
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

