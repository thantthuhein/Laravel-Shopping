@extends('layouts.layout')

@section('title')
    Explore Products
@endsection

@section('content')
<div class="row justify-content-center">
        <div class="col-md-3 mt-3">
            <h3 class="text-center text-uppercase">Explore Products</h3>
        </div>
        <div class="col-md-6 mt-3 form-group">
            {{ Form::open(['url' => '/search' ,'method' => 'POST']) }}
                <input type="text" name="search" placeholder="Search" class="form-control">
            {{ Form::close() }}
        </div>
    </div>
    <div class="row justify-content-center">
        @if (! $results->isEmpty())
            <div class="col-md-11">
                <table class="table table-hover shadow">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>QUANTITY IN STORE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $product)
                        <tr>
                            <th>{{ $product->name }}</th>
                            <th>{{ $product->price }}</th>
                            <th>{{ $product->quantity }}</th>
                            <th><a class="btn btn-sm btn-info" href="{{ url('products', $product->id) }}"><i class="fas fa-info-circle"></i></a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if ($results->isEmpty())    
            <div class="col-md-8 mt-5">
                <p class="text-center h3">
                    Sorry, No Products Found 
                    <span class="h1"><i class="fas fa-sad-tear"></i></span>
                </p>
            </div>
        @endif
    </div>
@endsection