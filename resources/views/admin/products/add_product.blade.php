@extends('admin._layout')
@section('content')
    <div class="container">
        <div class="row">
            <div style="margin-bottom: 60px" class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @section('title')<title>Add Product</title>@endsection

                        <h4 class="card-title">Add Product</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form method="post" enctype="multipart/form-data" action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Product title</label>
                                <input type="text" name="title" placeholder="Product title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <select type="text" name="category_id" placeholder="Product category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}">
                                    <option disabled>Select category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('category') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product price</label>
                                <input type="text" name="price" placeholder="Product price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}">
                                @if($errors->has('price'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('price') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Product description</label>
                                <textarea name="description"  placeholder="Description of product" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="file_url" type="file"  placeholder="Description of product" style="margin-right: 50px" class="form-control {{ $errors->has('file_url') ? 'is-invalid' : '' }}">
                                @if($errors->has('file_url'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('file_url') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input  value="1" type="checkbox" name="status" type="checkbox" class="form-check-input">
                                    Product are aviable
                                </label>
                                @if($errors->has('status'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('status') }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a class="btn btn-light" href="#">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection
