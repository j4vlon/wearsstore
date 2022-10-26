@extends('front._layout')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Product Details sticky</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">sticky right</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Product Details -->
    <section class="htc__product__details pt--100 pb--100 bg__white">
        <div class="container">
            <div class="scroll-active">
                <div class="row">

                    <div class="col-md-7 col-lg-7 col-sm-5 col-xs-12">
                        <div class="product__details__container product-details-5">
                            <div class="scroll-single-product mb--30">
                                <img src="{{ $product->file_url }}" alt="full-image">
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-active col-md-5 col-lg-5 col-sm-7 col-xs-12 xmt-30">
                        <div class="htc__product__details__inner ">
                            <div class="pro__detl__title">
                                <h2>{{ $product->title }}</h2>
                            </div>
                            <div class="pro__dtl__rating">
                                <ul class="pro__rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <span class="rat__qun">(Based on 0 Ratings)</span>
                            </div>
                            <div class="pro__details">
                                <p>{{ $product->description }}</p>
                            </div>
                            <ul class="pro__dtl__prize">
                                <li class="old__prize">$15.21</li>
                                <li>${{ $product->price }}</li>
                            </ul>

                            <div class="product-action-wrap">
                                <div class="prodict-statas"><span>Quantity :</span></div>
                                <div class="product-quantity">
                                    <form action="{{ route('cart.update', $carts->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qty" value="{{ $carts->count }}">
                                            </div>
                                        </div>
                                        <ul class="pro__dtl__btn">
                                            <li class="buy__now__btn"><button type="submit" class="btn btn-outline-primary">Buy now</button></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Details -->
@endsection
