@extends('layouts.layout')

@section('content')
    <div class="container pt-5 pb-5">
        <p class="h3">{{ $product->name }}</p>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="border text-center">
                    <img class="w-100" src="{{ $product->imagePath }}" alt="">
                       
                    <div class="row pt-3 pb-3">
                        <div class="col-md-6 pr-0">
                            <a href="{{ route('addToCart', $product->id) }}" class="btn btn-outline-primary w-75">Add to cart</a>
                        </div>
                        <div class="col-md-6 pl-0 m-0">
                            <a class="btn btn-outline-success w-75" href="{{ url('wishlist', $product->id) }}">
                                @if (isset($list)) 
                                    @if ( in_array($product->id, $list) )
                                    Remove From Wishlist
                                    @else
                                    Add to Wish List
                                    @endif
                                @else
                                    Add to Wish List
                                @endif    
                            </a>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="col-md-6">
                {{-- <p>Colors: {{ $product->colors }}</p>
                <hr>
                <div class="d-inline bg-primary">Description:</div> 
                <div class="d-inline bg-warning">{{ $product->description }}</div>
                <hr>
                <p>Processors: {{ $product->processor }}</p>
                <hr>
                <p>Ghz: {{ $product->ghz }}</p>
                <hr>
                <p>Graphics: {{ $product->graphics }}</p>
                <hr>
                <p>Memory: {{ $product->memory }}</p>
                <hr>
                <p>Storage: {{ $product->storage }}</p>
                <hr>
                <p>Display: {{ $product->display }}</p>
                <hr>
                <p>Ports: {{ $product->ports }}</p> --}}
                <ul class="list-group">
                    <li class="list-group-item d-flex">
                        Colors:
                        <span class="pl-5">{{ $product->colors }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Description:
                        <span class="pl-3">{{ $product->description }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Processors:
                        <span class="pl-3">&nbsp;{{ $product->processor }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Ghz :
                        <span class="pl-5 ">&nbsp;&nbsp;&nbsp;&nbsp;{{ $product->ghz }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Graphics:
                        <span class="pl-4">&nbsp;&nbsp;{{ $product->graphics }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Memory:
                        <span class="pl-4">&nbsp;&nbsp;&nbsp;{{ $product->memory }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Storage:
                        <span class="pl-4">&nbsp;&nbsp;&nbsp;&nbsp;{{ $product->storage }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Display:
                        <span class="pl-5">{{ $product->display }}</span>
                    </li>
                    <li class="list-group-item d-flex">
                        Ports:
                        <span class="pl-5">&nbsp;&nbsp;&nbsp;{{ $product->ports }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
{{-- <div class="card shadow">
        <div class="card-header top-bar text-light">
            <div class="clearfix">
                <div class="float-left">
                    <p class="h3">{{ $product->name }}</p>
                    
                    Category : 
                    @foreach($product->categories as $category)
                        <span>{{ $category->name }}</span> .
                    @endforeach
                </div>
                <a href=""">
                    <div class="text-center text-light">
                        
                        
                    </div>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="clearfix">
                <p class="float-left">Price : <span class="badge badge-success">$ {{  $product->price }}</span></p>
                <p class="float-right">Quantity : <span class="badge badge-danger">{{ $product->quantity }}</span></p>
            </div>
            <p>
                Description : 
                {{ $product->description }}
            </p>

        </div>
    </div> --}}