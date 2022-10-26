@extends('admin._layout')
@section('content')
    <div class="container">
        <div class="header-block" style="margin-bottom: 30px">
            <h2>Add category</h2>
        </div>
        <div class="row">
            <div style="margin-bottom: 60px" class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @section('title')<title>Edit category</title>@endsection
                        <h4 class="card-title">Edit category</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form method="post" enctype="multipart/form-data" action="{{ route('categories.update', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Category title: {{ $category->title }}</label>
                                <input type="text" name="title" value="{{ $category->title }}" placeholder="Category title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
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
    </div>

@endsection
