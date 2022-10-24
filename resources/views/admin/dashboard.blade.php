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
{{--                                                <th>--}}
{{--                                                    Progress--}}
{{--                                                </th>--}}
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
{{--                                                <td>--}}
{{--                                                    <div class="progress">--}}
{{--                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
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
                                                    <a href="categories/{{ $product->id }}" class="btn btn-primary" style="width: 100%; margin-bottom: 5px">Edit</a>
                                                    <br>
                                                    <form action="{{ route('categories.destroy', $product->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" style="width: 100%">Delet</button>
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
