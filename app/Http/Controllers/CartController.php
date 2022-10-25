<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index($id) {
        $carts = CartItem::with('product')->where('session_id', $id)->get();

        return view('front.cart', compact('carts'));
    }

    public function addToCart(Request $request, $id){
        $cart = new CartItem();
        if (Auth::user()){
            $cart->user_id = Auth::user()->id;
        }
        $cart->session_id = session()->getId();
        $cart->count = 1;
        $cart->product_id = $id;
        $cart->save();
        return redirect()->back()->with('success', 'Added to cart');
    }

    public function deleteCartItem($id) {
        $product = CartItem::firstOrfail('id', $id);
        $product->delete();
        return redirect()->back();
    }
}
