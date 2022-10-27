<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $carts = CartItem::with('product')->where('session_id', session()->getId())->get();
        return view('front.cart', compact('carts'));
    }

    public function addToCart(Request $request) {
        $carts = CartItem::where('product_id', $request->product_id)->first();
        if (isset($carts) && $carts->product_id == $request->product_id && $carts->session_id == session()->getId()) {
            $carts->qty += $carts->qty;
            $carts->save();
        } else {
            $cart = new CartItem();
            if (Auth::check()){
                $cart->user_id = Auth::id();
            }
            $cart->session_id = session()->getId();
            $cart->qty = 1;
            $cart->product_id = $request->product_id;
            $cart->save();
        }
        return redirect()->back()->with('success', 'Added to cart');
    }

    public function updateCartItem(Request $request, $id) {
        $cart = CartItem::where('id', $id)->first();
        $cart->qty = $request->qty;
        $cart->save();
        return redirect()->back();
    }

    public function deleteCartItem($id) {
        $product = CartItem::firstOrfail('id', $id);
        $product->delete();
        return redirect()->back();
    }
}
