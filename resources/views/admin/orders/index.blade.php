@extends('admin._layout')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Orders list</h4>
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
                            <th>
                                Username
                            </th>
                            <th>
                                User email
                            </th>
                            <th>
                                User address
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{ $order->id }}
                                </td>
                                <td>
                                    {{ $order->product->title }}
                                </td>
                                <td>
                                    ${{ $order->product->price }}
                                </td>
                                <td>
                                    {{ $order->product->description }}
                                </td>
                                <td>
                                    <a href=""><img src="{{ $order->product->file_url }}" alt="" style="width: 180px"></a>
                                </td>
                                <td>
                                    Неактивен
                                </td>
                                <td>
                                    {{ $order->user->name }}
                                </td>
                                <td>
                                    {{ $order->user->email }}
                                </td>
                                <td>
                                    {{ $order->user->address }}
                                </td>
                                <td>
                                    <a href="/admin/orders/{{ $order->id }}/edit" class="btn btn-primary" style="width: 100%; margin-bottom: 5px">Edit</a>
                                    <br>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="post">
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
