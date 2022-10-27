@extends('admin._layout')
@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @section('title')<title>Edit product</title>@endsection
                <h4 class="card-title">Edit order: {{ $order->product->title }}  #{{ $order->id }}</h4>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <form action="{{ route('orders.update', $order->id) }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Order quantity</label>
                        <input type="number" name="qty"  class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $order->product_qty }}">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">User name</label>
                        <input type="text" name="name" placeholder="Product price" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $order->user->name }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">User address</label>
                        <input type="text" name="address" placeholder="Product price" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{ $order->user->address }}">
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">User email</label>
                        <input type="email" name="email" placeholder="Product price" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $order->user->email }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a class="btn btn-light" href="#">Back</a>
                </form>
            </div>
        </div>
    </div>


@endsection

