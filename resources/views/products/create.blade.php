@extends('layout')

@section('content')

    <div>
    <h1>Product Create</h1>
    <a href="{{ route('products.index') }}" class="btn btn-primary">List</a>
        <div class="row">
            <div class="col-md-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <textarea name="description"  class="form-control" id="" cols="30" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number"  name="price" step="0.01" class="form-control" aria-describedby="emailHelp" placeholder="Enter price">
                </div>
                <br>
                <div class="form-group ">
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

                </form>
            </div>
        </div>

    </div>
@endsection