<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index() {
        $cartItems = CartItem::with('product')->where('session_id', session()->getId())->get();
        return view('front.checkout', compact('cartItems'));
    }

    public function store(CheckoutRequest $request) {
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
        $orders_id = [];
        foreach ($carts as $cart)
        {
            $orders = new Order();
            $orders->product_id = $cart->product_id;
            $orders->user_id = $user->id;
            $orders->username = $user->name;
            $orders->user_email = $user->email;
            $orders->user_address = $user->address;
            $orders->product_qty = $cart->qty;
            $orders->save();
            $cart->order_id = $orders->id;
            $cart->save();
            $orders_id[] = $orders->id;

            Mail::send('front.checkout_succes', [
                'order_id' => $orders->id
            ], function ($message) {
                $message->from('test@test.rw');
                $message->to('test@test.ru');
                $message->subject('New order was added');
            });
        }
        return redirect()->route('checkout.success')->with(['order_id' => $orders_id]);
}

    public function success() {
        return view('front.checkout_succes');
    }
}
