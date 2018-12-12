@extends('layout')

@section('content')
    <a href="{{ url('products/create') }}" class="btn btn-primary">Create New Product</a>
    
    <hr>
    
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-4">
                <h3>
                    <a href="{{ url('products', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    
                    <p>
                        {{ $product->description }}
                    </p>
                    <p>Price - <span class="badge badge-success">$ {{  $product->price }}</span></p>
                    <p>Quantity - <span class="badge badge-danger">{{ $product->quantity }}</span></p>
                    
                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('cart')}}" class="btn btn-primary">Add To Cart</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        <hr>        
                </div>
            @endforeach
        </div>
    </div>
@endsection