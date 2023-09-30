@extends('layouts.app')
@section('title', 'Product')

@section('main')
    <div class="container">
        <h2 class="text-center text-uppercase my-3">Add new product</h2>
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value="{{ old('name') ?? $product->name }}" name="name" class="form-control"
                            placeholder="Enter your name..">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Category_id</label>
                        <select class="form-control" name="category_id">
                            <option value="none">--choose--</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" value="{{ old('image') }}" name="image" class="form-control"
                            placeholder="Enter your image..">
                        <div>
                            <img src="{{ url('') }}/uploads/products/{{ $product->image }}" width="100px"
                                alt="">
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" value="{{ old('price') ?? $product->price }}"
                            class="form-control" placeholder="Enter your price..">
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="text" name="discount" value="{{ old('discount') ?? $product->discount }}"
                            class="form-control" placeholder="Enter your discount..">
                        @error('discount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="" rows="3">{{ old('description') ?? $product->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary text-center">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
