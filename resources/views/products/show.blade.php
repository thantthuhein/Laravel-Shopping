@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header top-bar text-light">
                        <div class="clearfix">
                            <div class="float-left">
                                <p class="h3">{{ $product->name }}</p>
                                
                                Category : 
                                @foreach($product->categories as $category)
                                    <span>{{ $category->name }}</span> .
                                @endforeach
                            </div>
                            <a href="{{ url('wishlist', $product->id) }}" class="float-right">
                                <div class="text-center text-light">
                                    @if (isset($list)) 
                                        @if ( in_array($product->id, $list) )
                                        <i title="Wish List" class="fas fa-heart text-danger"></i>
                                        @else
                                        <i title="Wish List" class="fas fa-heart text-light"></i>
                                        @endif
                                    @else
                                        <i title="Wish List" class="fas fa-heart text-light"></i>
                                    @endif
                                    
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
                </div>
            </div>
        </div>
    </div>
@endsection