@extends('admin._layout')
@section('content')

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @section('title')<title>Edit product</title>@endsection

                        <h4 class="card-title">Edit product: {{ $product->title }}</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('products.update', $product->id) }}" class="forms-sample" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Product Title</label>
                                <input type="text" name="title" placeholder="Product name" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $product->title }}">
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <select type="text" name="category_id" placeholder="Product category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" style="border: none;
    border-bottom: 1px solid #c1c1c1;">
                                    <option disabled>Select category</option>
                                    @foreach($categories as $category)
                                        <option {{ $product->category === $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                            {{ $category->title }}
                                        </option>
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
                                <input type="text" name="price" placeholder="Product price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ $product->price }}">
                                @if($errors->has('price'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('price') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Product description</label>
                                <textarea name="description"  placeholder="Description of product" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ $product->description }}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="file_url" type="file"  placeholder="Description of product" style="margin-right: 50px" class="form-control {{ $errors->has('file_url') ? 'is-invalid' : '' }}" {{ $product->file_url }}>
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


@endsection
