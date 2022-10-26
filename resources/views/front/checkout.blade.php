@extends('front._layout')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('assets/images/2.jpg')}}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Checkout</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Checkout</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Checkout Area -->
    <section class="our-checkout-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="ckeckout-left-sidebar">
                        <!-- Start Checkbox Area -->
                        <div class="checkout-form">
                            <h2 class="section-title-3">Billing details</h2>
                            <div class="checkout-form-inner">
                                <form action="{{ route('create.order') }}" method="post">
                                    @csrf
                                <div class="single-checkout-box">
                                    <input type="text" placeholder="First Name*" name="name">
                                    <input type="text" placeholder="Address*" name="address">
                                </div>
                                <div class="single-checkout-box">
                                    <input type="email" placeholder="Email*" name="email">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Checkbox Area -->
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="checkout-right-sidebar">
                        <div class="our-important-note">
                            <h2 class="section-title-3">Your order :</h2>
                            <ul class="important-note">
                                @foreach($cartItems as $cartItem)
                                <li><a href="#">{{ $cartItem->product->title }}</a></li>
                                <li><a href="#">{{ $cartItem->product->description }}</a></li>
                                <li><a href="#">{{ $cartItem->product->price }}</a></li>
                                <li><a href="#">{{ $cartItem->count }}</a></li>
                                <li>
                                    <div class="puick-contact-area mt--60">
                                        <img src="{{ $cartItem->product->file_url }}" alt="">
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout Area -->
@endsection
