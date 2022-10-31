<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UsersController;
use \App\Http\Controllers\Admin\AdminProductsController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\CategoryController;


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
    Route::resource('/users', UsersController::class);
});

Route::get('/', [FrontController::class, 'homepage']);
Route::get('/categories', [FrontController::class, 'CategoriesView'])->name('categories');
Route::get('/category/{slug}', [FrontController::class, 'CategoryView'])->name('category');


Route::get('/product/{slug}', [ProductsController::class, 'show']);

Route::get('/cart/', [CartController::class, 'index']);
Route::post('/cart/', [CartController::class, 'addToCart'])->name('cart.create');
Route::put('/cart/{id}', [CartController::class, 'updateCartItem'])->name('cart.update');
Route::delete('cart/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('show.checkout');
Route::post('checkout', [CheckoutController::class, 'store'])->name('create.order');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

