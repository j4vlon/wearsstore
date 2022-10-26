<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homepage() {
        return view('front.homepage');
    }

    public function CategoryView() {
        $products = Product::all();
        $categories = Category::all();
        return view('front.categories', compact('products', 'categories'));
    }
}
