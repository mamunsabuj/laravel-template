@extends('layout')

@section('content')

    <div>
    <h1>Sales</h1>
    <a href="{{ route('sale.create') }}" class="btn btn-primary">Create</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sl</th>
                <th>Product</th>
                <th>Batch</th>
                <th>Quantity</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>

        @forelse($sales as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->batch }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->note }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No item found</td>
        </tr>
        @endforelse
        </tbody>
    </table>

    </div>
@endsection