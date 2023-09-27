@extends('layouts.app')

@section('title', 'Category')

@section('main')
    <div class="container">
        <a class="btn btn-primary my-3" href="{{ route('category.create') }}" role="button">+Add New</a>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status == 1 ? 'Show' : 'Hide' }}</td>
                        <td>
                            <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary" href="{{ route('category.edit', $item->id) }}"
                                    role="button">Edit</a>
                                <button onclick="return confirm('Are you sure ????')" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
