@extends('layouts.layout')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-11">
            @if ($products->isEmpty())
                <h1 class="mt-5 text-center">
                    There is No Products ! <i class="fas fa-frown"></i>
                </h1>
            @else    
                <table class="table table-hover shadow">
                    <thead class="bg-dark">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity I Store</th>
                            <th>Description</th>
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
                                <th>{{ $product->description }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection