@extends('layouts.layout')

@section('title')
    Wish List
@endsection

@section('content')
    @if ($wishlists->isNotEmpty())
        <div class="row mt-5 justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">Wish Lists</h3>
            </div>
        </div>
    @endif
    <div class="row mt-5 pl-5 pr-5">
        @if ($wishlists->isEmpty())
        <div class="col-md-12">
            <h1 class="mt-5 text-center">No Items In Wish List ! <i class="fas fa-frown"></i></h1>
        </div>
        @else
            @foreach ($wishlists as $wishlist)          
            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-header">
                        <div class="clearfix">
                            <h5 class="float-left"><a href="{{ url('products', $wishlist->product_id) }}">{{ $wishlist->name }}</a></h5>
                            <a href="{{ url( '/wishlist/remove', $wishlist->product_id ) }}" class="float-right text-danger"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <p class="float-left h5">$ {{ $wishlist->price }}</p>
                            <a href="{{ route('addToCart', ['id' => $wishlist->product_id] ) }}" class="btn btn-success btn-sm float-right"> <i class="fas fa-shopping-cart"></i> </a>
                        </div>
                    </div>

            </div>
            <br>
            </div>
            @endforeach
        @endif
    </div>
@endsection