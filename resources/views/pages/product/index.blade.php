@extends('layouts.app')

@section('title', 'Product')

@section('main')
    <div class="container">
        <a class="btn btn-primary my-3" href="{{ route('product.create') }}" role="button">+Add New</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{ url('') }}/uploads/products/{{ $item->image }}" width="60px" alt="image">
                        </td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->discount }}</td>
                        <td>
                            <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary" href="{{ route('product.edit', $item->id) }}"
                                    role="button">Edit</a>
                                <button onclick="return confirm('Are you sure ????')" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
