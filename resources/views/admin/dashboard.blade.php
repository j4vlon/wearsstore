@extends('admin._layout')
@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('assets/images/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Adding goods</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="/">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Adding goods</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Contact Area -->
    <section class="htc__contact__area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="htc__contact__container">
                        <div class="contact-form-wrap">
                            <div class="contact-title">
                                <h2 class="contact__title">Add goods</h2>
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="name" placeholder="Product name"
                                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <select type="text" name="category" placeholder="Product category"
                                            class="{{ $errors->has('category') ? 'is-invalid' : '' }}"
                                            style="border: none;
    border-bottom: 1px solid #c1c1c1;">
                                            <option disabled>Select category</option>
                                            <option value="furnitures">Furnitures</option>
                                            <option value="bags">Bags</option>
                                            <option value="decoration">Decorations</option>
                                            <option value="accessories">Accessories</option>
                                        </select>
                                        @if ($errors->has('category'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('category') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="price" placeholder="Product price"
                                            class="{{ $errors->has('price') ? 'is-invalid' : '' }}">
                                        @if ($errors->has('price'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('price') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="description" placeholder="Description of product"
                                            class="{{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                                        @if ($errors->has('description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <input name="file_url" type="file" placeholder="Description of product"
                                            style="margin-right: 50px"
                                            class="{{ $errors->has('file') ? 'is-invalid' : '' }}">
                                        @if ($errors->has('file_url'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('file_url') }}
                                            </div>
                                        @endif
                                        <label for="status">Product are aviable</label>
                                        <input type="checkbox" name="status" style="margin-left: 15px"
                                            class="{{ $errors->has('status') ? 'is-invalid' : '' }}" value="1">
                                        @if ($errors->has('status'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <input type="submit" class="fv-btn">
                                </div>
                            </form>
                        </div>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Contact Area -->
@endsection
