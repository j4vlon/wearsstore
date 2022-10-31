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

    public function CategoriesView(Request $request) {
        $products = Product::query();
        $categories = Category::all();
        $max_price = Product::all()->min('price');
        $min_price = Product::all()->max('price');
        $min_price_filter = $request->min_price;
        $max_price_filter = $request->max_price;

        if ($min_price_filter && $max_price_filter) {
            if ($min_price_filter > 0 && $max_price_filter > 0) {
                $products= $products->whereBetween('price', [intval($min_price_filter), (int)$max_price_filter]);
            }
        }
        $products = $products->get();

        if ($request->price_down){
            $products = Product::all()->sortByDesc('price');
        }
        if ($request->price_up){
            $products = Product::all()->sortBy('price');
        }

        if ($request->new_date) {
            $products = Product::all()->sortByDesc('created_at');
        }
        if ($request->old_date) {
            $products = Product::all()->sortBy('created_at');
        }

        return view('front.categories', compact('products', 'categories', 'min_price', 'max_price'));
    }

    public function CategoryView(Request $request, $slug) {
        $category = Category::with('products')->where('slug', $slug)->first();
        $categories = Category::all();
        $products = Product::where('category_id', $category->id);
        $max_price = Product::where('category_id', $category->id)->min('price');
        $min_price = Product::where('category_id', $category->id)->max('price');
        $min_price_filter = $request->min_price;
        $max_price_filter = $request->max_price;
        if ($min_price_filter && $max_price_filter) {
            if ($min_price_filter > 0 && $max_price_filter > 0) {
                $products= $products->whereBetween('price', [intval($min_price_filter), (int)$max_price_filter]);
            }
        }
        $products = $products->get();

        if ($request->price_down){
            $products = $products->sortByDesc('price');
        }
        if ($request->price_up){
            $products = $products->sortBy('price');
        }

        if ($request->new_date) {
            $products = $products->sortByDesc('created_at');
        }
        if ($request->old_date) {
            $products = $products->sortBy('created_at');
        }
//        dd($min_price, $max_price);
        return view('front.category', compact('categories', 'products', 'category', 'min_price', 'max_price'));
    }
}
