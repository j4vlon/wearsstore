@extends('front._layout')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('assets/images/2.jpg')}}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Cart</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    @if(!$cart->order_id)
                                    <tr>
                                            <td class="product-thumbnail"><a href="{{ $cart->product->file_url }}"><img src="{{ $cart->product->file_url }}" alt="product img" /></a></td>
                                            <td class="product-name"><a href="product/{{ $cart->product->slug }}">{{ $cart->product->title }}</a></td>
                                            <td class="product-price"><span class="amount">{{ $cart->product->price }}</span></td>
                                            <td class="product-quantity">
                                                <form action="{{ route('cart.update', $cart->id) }}" method="post" style="display: flex;align-items: center;
    justify-content: space-around;">
                                                    @csrf
                                                    @method('PUT')
                                                            <input type="number" name="qty" value="{{ $cart->qty }}">

                                                        <button type="submit" class="btn btn-success" style="height: 40px">Save</button>

                                                </form>
                                            </td>
                                            <td class="product-subtotal">£165.00</td>
                                            <td class="product-remove">
                                                <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" href=""><i class="fa-sharp fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                    </tr>
                                    @else
                                        <h4>Your cart is empty</h4>
                                        @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">

                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <div class="wc-proceed-to-checkout">
                                        <a href="/checkout">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
@endsection
