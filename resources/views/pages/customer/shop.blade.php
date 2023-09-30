@extends('layouts.customer')

@section('title', 'Shop Page')

@section('main')
    <div class="container">
        <h2 class="text-center text-uppercase my-3">All Products</h2>
        <div class="box-search my-3">
            <form>
                <div class="d-flex">
                    <div class="w-25 mr-2">
                        <input type="text" name="keyword" value="{{ request()->keyword }}" id="" class="form-control"
                            placeholder="Enter your keyword">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <form action="" method="get">
            <div class="form-group">
                <label for="order">Sort By...</label>
                <div class="d-flex">
                    <div class="w-25">
                        <select class="form-control mr-3" name="order" id="order">
                            <option value="name-ASC">Name (a - z)</option>
                            <option value="name-DESC">Name (z - a)</option>
                            <option value="price-ASC">Price (low - high)</option>
                            <option value="price-DESC">Price (high - low)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary ml-3">Filter</i></button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($allProducts as $item)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <a href="{{ route('detail', $item->id) }}">
                            <img class="card-img-top" src="{{ url('') }}/uploads/products/{{ $item->image }}"
                                alt="">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('detail', $item->id) }}">
                                <h4 class="card-title">{{ $item->name }}</h4>
                            </a>
                            <p class="card-price"><span class="font-weight-bold">Price</span> : ${{ $item->price }}</p>
                            @if ($item->discount > 0)
                                <p class="card-price"><span class="font-weight-bold">Sale Price</span> :
                                    ${{ $item->discount }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="container my-4">
                {{ $allProducts->links() }}
            </div>
        </div>
    </div>
@endsection
