@extends('layout')

@section('content')
    
    
    <ul class="nav list-inline">
        <li class="list-item"><a class="btn" href=" {{ url('cart') }} ">Cart List</a></li>
        <li class="list-item"><a class="btn" href=" {{ url('categories')}} ">Manage Category</a></li>
    </ul>
    <hr>
    <div class="d-flex justify-content-center">
        {{ $products->links()}}
    </div>
    <br>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-4 mt-5">
                    <div class="card shadow">
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
                                Category -
                                @foreach($product->categories as $category)
                                    {{ $category->name }}, 
                                @endforeach
                            </p>
                        </div>
            
                        <div class="card-footer">

                            {{ Form::open([
                                'route' => ['products.destroy', $product->id],
                                'class' => 'd-inline',
                                'method' => 'DELETE'
                            ])}}
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            {{ Form::close()}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            {{ $products->links()}}
        </div>
        <hr>
    </div>
@endsection