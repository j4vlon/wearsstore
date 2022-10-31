<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homepage() {
        $categories = Category::all();
        $products = Product::orderBy('id', 'DESC')->take(10)->get();

        return view('front.homepage', compact('products', 'categories'));
    }

    public function CategoriesView(Request $request) {
        $products = Product::query();
        $categories = Category::all();
        $min_price = Product::all()->min('price');
        $max_price = Product::all()->max('price');
        $min_price_filter = $request->min_price;
        $max_price_filter = $request->max_price;

        if ($min_price_filter && $max_price_filter) {
            if ($min_price_filter > 0 && $max_price_filter > 0) {
                $products= $products->whereBetween('price', [intval($min_price_filter), (int)$max_price_filter]);
            }
        }

        $this->sorting($products);

        $products = $products->get();


        return view('front.categories', compact('products', 'categories', 'min_price', 'max_price'));
    }

    public function CategoryView(Request $request, $slug) {
        $selected_category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $products = Product::where('category_id', $selected_category->id);
        $min_price = $products->min('price');
        $max_price = $products->max('price');
        $min_price_filter = $request->input('min_price');
        $max_price_filter = $request->max_price;
        if ($min_price_filter && $max_price_filter) {
            if ($min_price_filter > 0 && $max_price_filter > 0) {
                $products= $products->whereBetween('price', [intval($min_price_filter), (int)$max_price_filter]);
            }
        }

        $products = $this->sorting($products);

        $products = $products->get();

        /*if ($request->price_down) {
            $products = $products->sortByDesc('price');
        }
        if ($request->price_up) {
            $products = $products->sortBy('price');
        }

        if ($request->new_date) {
            $products = $products->sortByDesc('created_at');
        }
        if ($request->old_date) {
            $products = $products->sortBy('created_at');
        }*/
        return view('front.category', compact('categories', 'products', 'selected_category', 'min_price', 'max_price'));
    }

    private function sorting($products) {
        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $products = $products->orderBy($attribute, $sort_order);
        } else {
            $products = $products->latest();
        }

        return $products;
    }
}
