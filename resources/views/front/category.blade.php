@extends('front._layout')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('assets/images/2.jpg')}}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Shop Page</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Shop Page</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Our Product Area -->
    <section class="htc__product__area shop__page ptb--130 bg__white">
        <div class="container">
            <div class="htc__product__container">
                <!-- Start Product MEnu -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter__menu__container">
                            <div class="product__menu">
                                <a href="/categories">All</a>
                                @foreach($categories as $category)
                                    <a href="{{ route('category', $category->slug) }}" style="margin-left: 20px;"  class="{{ route('category', $category->slug) == url()->current() ? 'active' : '' }}">{{ $category->title }}</a>
                                @endforeach
                            </div>
                            <div style="display: flex">
                                <form action="{{ route('category', $selected_category->slug) }}" style="margin-right: 20px">
                                    <input type="submit" value="price" name="sort" class="input">
                                </form>
                                <form action="{{ route('category', $selected_category->slug) }}" style="margin-right: 20px">
                                    <input type="submit" value="-price" name="sort" class="input">
                                </form>
                                <form action="{{ route('category', $selected_category->slug) }}" style="margin-right: 20px">
                                    <input type="submit" value="created_at" name="sort" class="input">
                                </form>
                                <form action="{{ route('category', $selected_category->slug) }}" style="margin-right: 20px">
                                    <input type="submit" value="-created_at" name="sort" class="input">
                                </form>
                            </div>
                            <div class="filter__box">
                                <a class="filter__menu" href="#">filter</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Filter Menu -->
                <div class="filter__wrap">
                    <div class="filter__cart">
                        <div class="filter__cart__inner">
                            <div class="filter__menu__close__btn">
                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                            </div>
                            <div class="filter__content">
                                <!-- Start Single Content -->
                                <div class="fiter__content__inner">
                                    <div class="single__filter">
                                        <h2>Sort By</h2>
                                        <ul class="filter__list">
                                            <li>
                                                <form action="/category/{{ $selected_category->slug }}" method="get">
                                                    <input type="number" name="min_price" min="10" step="10" placeholder="{{ $min_price }} Min price" class="form-control" style="margin-bottom: 10px">
                                                    <input type="number" name="max_price" min="10" step="10" placeholder="{{ $max_price }} Max price" class="form-control" style="margin-bottom: 10px">
                                                    <input type="submit" class="btn btn-primary">
                                                </form>
                                                <br>
                                                <a class="btn btn-primary" href="{{ route('category', $selected_category->slug) }}">Отменить</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Menu -->
                <!-- End Product MEnu -->
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="product__list another-product-style">
                        <!-- Start Single Product -->
                        @foreach($products as $product)
                            <div style="height: 400px" class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12 {{ $product->category }}">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="{{ $product->file_url }}" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a class="quick-view modal-view detail-link" href="/product/{{ $product->slug }}"><i class="fa-solid fa-eye"></i></a></li>
                                                <li>
                                                    <form action="{{ route('cart.create') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                        <button style="background:none;border: none;" title="Add TO Cart" type="submit">
                                                            <i class="fa-sharp fa-solid fa-cart-plus"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><a title="Wishlist" href="wishlist.html"><i class="fa-solid fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">{{ $product->title }}</a></h2>
                                        <h2>{{ $product->created_at }}</h2>
                                        <ul class="product__price">
                                            <li class="new__price">${{ $product->price }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- End Single Product -->
                    </div>
                </div>
                <!-- Start Load More BTn -->

                <!-- End Load More BTn -->
            </div>
        </div>
    </section>
    <!-- End Our Product Area -->
@endsection

