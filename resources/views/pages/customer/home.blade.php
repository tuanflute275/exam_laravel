@extends('layouts.customer')

@section('title', 'Home Page')

@section('main')
    <div class="container-fluid">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img width="100%"
                        src="https://ik.imagekit.io/tvlk/blog/2021/09/du-lich-anh-8-1024x576.jpg?tr=dpr-2,w-675"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img width="100%" src="https://vuongquocanh.com/wp-content/uploads/2018/05/london-eye-800x534.jpg"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img width="100%" src="https://www.tugo.com.vn/wp-content/uploads/1-3339-1415416821.jpg"
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center text-uppercase my-3">New Products</h2>
        <div class="row">
            @forelse ($new_products as $item)
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
            @empty
                <div class="d-flex justify-content-center">
                    <h2 class="text-center font-weight-bold">No data</h2>
                </div>
            @endforelse
        </div>
    </div>
    <div class="container">
        <h2 class="text-center text-uppercase my-3">Sale Price</h2>
        <div class="row">
            @forelse ($sale_products as $item)
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
                            <span class="card-price mr-3"><span class="font-weight-bold">Price</span> :
                                ${{ $item->price }}</span>
                            @if ($item->discount > 0)
                                <span class="card-sale_price"><span class="font-weight-bold">Sale Price</span> :
                                    {{ $item->discount }}$</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="d-flex justify-content-center">
                    <h2 class="text-center font-weight-bold">No data</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
