@extends('layouts.customer')

@section('title', 'Cart')

@section('main')
    <div class="container-fluid p-4">
        <div class="text-center">
            <h3>Your Cart</h3>
        </div>
        @if (count($carts) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $key => $item)
                        <tr>
                            <td scope="row">{{ $key }}</td>
                            <td>{{ $item['product_id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td><img src="{{ url('') }}/uploads/products/{{ $item['image'] }}" width="60px"
                                    alt="">
                            </td>
                            <td>${{ number_format($item['price']) }}</td>
                            <td>
                                <form action="{{ route('update_cart', $item['product_id']) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['product_id'] }}">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                        class="form-control">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                            <td>
                                ${{ number_format($item['price'] * $item['quantity']) }}
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure ??')" class="btn btn-danger"
                                    href="{{ route('delete_cart', $item['product_id']) }}" role="button">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <a href="{{ route('shop') }}"class="btn btn-sm btn-primary">Continue Shopping</a>
                <a href="{{ route('clear') }}" class="btn btn-sm btn-danger"
                    onclick="return confirm('Do you want to delete all items ?')">Delete All</a>
                <a href="" class="btn btn-sm btn-success">Order Now</a>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>empty cart!</strong> <a href="{{ route('shop') }}">click here</a> to continue shopping.
            </div>
        @endif
    </div>
@endsection
