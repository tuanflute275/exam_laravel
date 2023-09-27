@extends('layouts.app')

@section('title', 'Category')

@section('main')
    <div class="container">
        <form action="{{ route('category.update', $cat->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ old('name') ?? $cat->name }}" class="form-control" placeholder="">
            </div>
            <label for="">Status: </label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status" value="1"
                            {{ $cat->status == 1 ? 'checked' : '' }}> Show
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status" value="0"
                            {{ $cat->status == 0 ? 'checked' : '' }}> Hide
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
