@extends('layout')

@section('content')

    <div>
    <h1>Purchase Create</h1>
    <a href="{{ route('purchase.index') }}" class="btn btn-primary">List</a>
        <div class="row">
            <div class="col-md-12">

            <div id="purchaseCreate"></div>


            </div>
        </div>

    </div>
@endsection
@push('scripts')
    @vite('resources/js/purchase.js')
@endpush
