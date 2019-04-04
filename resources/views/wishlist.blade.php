@extends('layouts.layout')

@section('title')
    Wish List
@endsection

@section('content')
    @if ($wishlists->isNotEmpty())
        <div class="row m-0 mt-3 pl-5">
            <div class="col-md-4">
                <h1 class="pb-3">Wish Lists</h1>
            </div>
            @if(Session::has('success'))
            <div class="col-md-8 pb-0 mb-0">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    <a href="" class="float-right text-danger pr-1"><i class="fas fa-times"></i></a>
                </div>
            </div>
            @endif
            
            @if (Session::has('error'))
                <div class="col-md-8 pb-0 mb-0">
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                        <a href="" class="float-right text-danger pr-1"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            @endif
        </div>
    @endif
    <div class="row mt-4 pl-5 m-0">
        @if ($wishlists->isEmpty())
        <div class="col-md-12">
            <h1 class="mt-5 text-center">No Items In Wish List ! <i class="fas fa-frown"></i></h1>
        </div>
        @else

        <div class="col-md-12">

            <table class="table table-bordered table-hover shadow">
                <thead class="top-bar text-light">
                    <tr>
                        <th>Product Name</th>
                        <th>Item Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlists as $wishlist)
                        <tr>
                            <th>
                                <a href="{{ url('products', $wishlist->product_id) }}">{{ $wishlist->name }}  <i class="fas fa-arrow-circle-right"></i></a>
                            </th>
                            <th><span class="badge badge-success">$</span> {{ $wishlist->price }}</th>
                            <th>
                                <a href="{{ route('addToCart', ['id' => $wishlist->product_id] ) }}" class="btn btn-sm btn-success" title="Add to Cart"> <i class="fas fa-shopping-cart"></i> </a>
                                <a href="{{ url( '/wishlist/remove', $wishlist->product_id ) }}" class="btn btn-sm btn-danger" title="Remove from Wishlists"><i class="fas fa-times"></i></a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        @endif
    </div>
@endsection