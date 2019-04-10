@extends('layouts.layout')

@section('title')
    Explore Products
@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="clearfix">
                    <div class="float-left">
                        <h5 class="text-uppercase"> {{ count($products)  }} Items</h5>
                    </div>
                    <div class="form-group float-right">
                        {{ Form::open(['url' => '/search' ,'method' => 'POST']) }}
                            <input type="text" name="search" placeholder="Search" class="form-control">
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-1">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>NAME</td>
                            <td>PRICE</td>
                            <td>QUANTITY IN STORE</td>
                            <td>ACTION</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <a href="{{ url('products', $product->id) }}">{{ $product->name }}</a>
                            </td>
                            <td><span class="badge badge-success">$</span> {{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><a href="{{ url('products', $product->id) }}" class="btn btn-outline-info"> <i class="fas fa-info-circle"></i> </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection