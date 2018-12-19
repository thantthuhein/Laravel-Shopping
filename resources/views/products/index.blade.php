@extends('layout')

@section('content')
    <a href="{{ url('products/create') }}" class="btn btn-primary">Create New Product</a>

    <hr>
    <div class="d-flex justify-content-center">
        {{ $products->links()}}
    </div>
    <br>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-4 mt-5">
                    <div class="card">
                        <div class="p-3">
                            <img src="https://via.placeholder.com/150" class="card-img-top">
                        </div>
                        
                        <div class="card-body">
                            <h3>
                                <a class="product_name card-title" href="{{ url('products', $product->id) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p>
                                {{ substr($product->description, 0, 50) . '...' }}
                                <a href="{{ route('products.show', $product->id) }} ">see more</a>
                            </p>
                            <p>Price - <span class="badge badge-success">$ {{  $product->price }}</span></p>
                            <p>Quantity - <span class="badge badge-danger">{{ $product->quantity }}</span></p>
                            <p>
                                @foreach($product->categories as $category)
                                    {{ $category->name }}
                                    <br>
                                @endforeach
                            </p>
                        </div>
            
                        <div class="card-footer">
                            {{ Form::open([
                                'route' => ['products.destroy', $product->id],
                                'method' => 'DELETE'
                            ])}}
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            {{ Form::open(['url' => 'cart', 'method' => "POST"]) }}
                                <a href="{{ url('cart') }}" class="btn btn-warning">Detail</a>

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-secendary">Add to Cart</button>
                            {{ Form::close() }}
                        </div>
                        <hr>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links()}}
        </div>
    </div>
@endsection