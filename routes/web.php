<?php

use Illuminate\Support\Facades\Route;

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

# Route for goods and categories
Route::controller(\App\Http\Controllers\GoodsController::class)->group(function (){
    Route::get('/', 'GoodsView');

    Route::get('/category/{slug}', 'CategoryView');

    Route::get('/products/{slug}', 'ProductView');

    Route::get('/cart', 'CartView');

    Route::get('/checkout', 'CheckoutView');

    Route::get('/checkout/success', 'SuccessCheckoutView');
# Route group for user with admin permission
    Route::group(['middleware' => 'Admin'], function(){
        Route::controller(\App\Http\Controllers\AdminController::class)->group(function(){
           Route:get('admin', 'AdminView');
        });
    });

});

