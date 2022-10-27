@extends('admin._layout')
@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @section('title')<title>Add user</title>@endsection
                <h4 class="card-title">Add user</h4>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <form action="{{ route('users.store') }}" class="forms-sample" method="post" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">User name</label>
                        <input type="text" name="name" placeholder="User name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">User address</label>
                        <input type="text" name="address" placeholder="User address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}">
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">User email</label>
                        <input type="email" name="email" placeholder="User email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
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

