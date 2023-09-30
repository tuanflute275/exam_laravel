@extends('layouts.customer')

@section('title', 'Product Detail')


@section('main')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5">
                <div class="banner_img card-img">
                    <img src="{{ url('') }}/uploads/products/{{ $pro->image }}" class="card-img" alt="">
                </div>
            </div>
            <div class="col md-7">
                <small>Id: {{ $pro->id }}</small>
                <h2>Name : {{ $pro->name }}</h2>
                <p><b>Price</b>: {{ $pro->price }}$</p>
                @if ($pro->discount > 0)
                    <p><b>Sale Price</b>: ${{ $pro->discount }}</p>
                @endif
                <p><b>Category</b>: {{ $pro->category->name }}</p>
                <p><b>Mô tả</b>: {{ $pro->description }}</p>
                <form action="{{ route('add_to_cart', $pro->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="w-25 mr-3">
                                <input type="number" name="quantity" class="form-control" name="qty" value="1" id=""
                                    placeholder="">
                                    @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
