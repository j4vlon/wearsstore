@extends('admin._layout')
@section('content')
    <div class="container">
        <div class="header-block" style="margin-bottom: 30px">
            <h2>Categories list</h2>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->created_at }}</td>

                <td>
                    <a href="/admin/categories/{{ $category->id }}" class="btn btn-primary" style="width: 100%; margin-bottom: 5px">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="width: 100%;">Delete</button>
                    </form>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
