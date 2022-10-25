<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('front.category', compact('category'));
    }
    
    public function show($slug)
    {
        $category = Product::where('slug', $slug)->first();

        return view('front.category', compact('category'));
    }
}
