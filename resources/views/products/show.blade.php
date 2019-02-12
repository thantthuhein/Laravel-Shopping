@extends('layouts.layout')

@section('content')
    <h3>
        <p>
            {{ $product->name }}
        </p>
    </h3>

    <p>
        {{ $product->description }}
    </p>
    <p>Price - <span class="badge badge-success">$ {{  $product->price }}</span></p>
    <p>Quantity - <span class="badge badge-danger">{{ $product->quantity }}</span></p>

    <ul>
        @foreach($product->categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    <hr>
    <a href="{{ url('products') }}" class="btn btn-primary">Back To Products</a>
@endsection