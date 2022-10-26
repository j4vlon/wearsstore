<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($slug) {
        $product = Product::where('slug', $slug)->first();
        $carts = CartItem::with('product')->where('session_id', session()->getId())->first();
        return view('front.product', compact('product', 'carts'));
    }
}
