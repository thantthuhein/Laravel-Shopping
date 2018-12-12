@extends('layout')

@section('content')
    <h3>
        <a href="#">
            {{ $product->name }}
        </a>
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
    <a href="{{ url('products') }}" class="btn btn-primary">Products</a>
@endsection