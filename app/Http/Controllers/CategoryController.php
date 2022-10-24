<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug){

        $category = Product::where('slug', $slug)->first();

        return view('front.category', compact('category'));
    }
}
