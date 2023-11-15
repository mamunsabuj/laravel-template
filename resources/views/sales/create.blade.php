@extends('layout')

@section('content')

    <div>
    <h1>Sale Create</h1>
        <div class="row">
            <div class="col-md-12">
            {{ csrf_field() }}
            <div id="SaleCreate"></div>

            </div>
        </div>

    </div>
@endsection
@push('scripts')
    @vite('resources/js/sale.js')
@endpush
