@extends('layouts.layout')

@section('title')
    Explore Products
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 pr-5 pl-5 mt-3">
        <div class="clearfix">
            <div class="float-left">
                <h5 class="text-center text-uppercase">{{ count($results)  }} Items Found</h5>
            </div>
            <div class="form-group float-right">
                {{ Form::open(['url' => '/search' ,'method' => 'POST']) }}
                    <input type="text" name="search" placeholder="Search" class="form-control">
                {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center">
        @if (! $results->isEmpty())
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
                        @foreach ($results as $product)
                        <tr>
                            <td><a href="{{ url('products', $product->id) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><a class="btn btn-outline-info" href="{{ url('products', $product->id) }}"><i class="fas fa-info-circle"></i></a></td>
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