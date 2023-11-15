@extends('layout')

@section('content')

    <div>
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sl</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>

        @forelse($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No item found</td>
        </tr>
        @endforelse
        </tbody>
    </table>

    </div>
@endsection