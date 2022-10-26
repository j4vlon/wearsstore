@extends('admin._layout')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product list</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Product title
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    {{ $product->id }}
                                </td>
                                <td>
                                    {{ $product->title }}
                                </td>
                                <td>
                                    ${{ $product->price }}
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>
                                <td>
                                    <a href="{{ $product->file_url }}"><img src="{{ $product->file_url }}" alt="" style="width: 180px"></a>
                                </td>
                                <td>
                                    @if(!$product->status)
                                        Неактивен
                                    @else
                                        Активен
                                    @endif
                                </td>
                                <td>
                                    <a href="products/{{ $product->id }}/edit" class="btn btn-primary" style="width: 100%; margin-bottom: 5px">Edit</a>
                                    <br>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="width: 100%">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
