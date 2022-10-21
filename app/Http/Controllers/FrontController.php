<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homepage() {
        return view('main.index');
    }

    public function GoodsView(){
        return view('main.index');
    }

    public function CategoryView(){
        return view('goods.categories');
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
