@extends('layouts.layout')

@section('title')
    Explore Products
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3 mt-3">
            <h3 class="text-uppercase">Explore Products</h3>
        </div>
        <div class="col-md-6 mt-3 form-group">
            {{ Form::open(['url' => '/search' ,'method' => 'POST']) }}
                <input type="text" name="search" placeholder="Search" class="form-control">
            {{ Form::close() }}
        </div>
    </div>
    <div class="row justify-content-center mt-3">
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
                    @foreach ($products as $product)
                    <tr>
                        <th>
                            <a href="{{ url('products', $product->id) }}">{{ $product->name }}</a>
                        </th>
                        <th><span class="badge badge-success">$</span> {{ $product->price }}</th>
                        <th>{{ $product->quantity }}</th>
                        <th><a href="{{ url('products', $product->id) }}" class="btn btn-sm btn-info"> <i class="fas fa-info-circle"></i> </a></th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection