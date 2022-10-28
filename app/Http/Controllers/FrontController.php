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

    public function CategoryView(Request $request) {
        $products = Product::query();
        $categories = Category::all();

        $min_price_filter = $request->min_price;
        $max_price_filter = $request->max_price;
        $date_filter = $request->date;
        if ($min_price_filter && $max_price_filter) {
            if ($min_price_filter > 0 && $max_price_filter > 0) {
                $products= $products->whereBetween('price', [intval($min_price_filter), (int)$max_price_filter]);
            }
        }
        $products = $products->get();
        return view('front.categories', compact('products', 'categories'));
    }
}
