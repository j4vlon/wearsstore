<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homepage() {
        return view('front.homepage');
    }

    public function GoodsView(){
        return view('main.index');
    }

    public function CategoryView(){
        $categories = Product::all();
        return view('front.categories', compact('categories'));
    }

    public function CartView(){
        return view('goods.shoppingcart');
    }

    public function CheckoutView(){
        return view('goods.checkout');
    }

    public function SuccessCheckoutView(){
        return view('goods.success');
    }
}
