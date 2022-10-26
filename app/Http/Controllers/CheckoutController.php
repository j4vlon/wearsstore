<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index() {
        $cartItems = CartItem::with('product')->where('session_id', session()->getId())->get();
        return view('front.checkout', compact('cartItems'));
    }

    public function store(Request $request) {
        if (Auth::check()){
            $carts = CartItem::where('user_id', Auth::id())->get();
        }else{
            $carts = CartItem::where('session_id', session()->getId())->get();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->save();
        }

        foreach ($carts as $cart)
        {
            $orders = new Order();
            $orders->product_id = $cart->product_id;
            $orders->user_id = $user->id;
            $orders->username = $user->name;
            $orders->user_email = $user->email;
            $orders->user_address = $user->address;
            $orders->save();
        }
        return redirect()->route('checkout.success');
    }

    public function success() {
        return view('front.checkout_succes');
    }
}
