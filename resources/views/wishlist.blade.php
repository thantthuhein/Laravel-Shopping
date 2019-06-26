@extends('layouts.layout')

@section('title')
    Wish List
@endsection

@section('content')
    <div class="container mb-5-outline">
        @if ($wishlists->isNotEmpty())
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="pb-4">Wish Lists</h5>
                </div>
                @if(Session::has('success'))
                <div class="col-md-8 pb-0 mb-0">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                
                @if (Session::has('error'))
                    <div class="col-md-8">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        @endif
        <div class="row">
            @if ($wishlists->isEmpty())
            <div class="col-md-12">
                <h1 class="mt-5 text-center">No Items In Wish List ! <i class="fas fa-frown"></i></h1>
            </div>
            @else
    
            <div class="col-md-12">
    
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Item Price</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlists as $wishlist)
                            <tr>
                                <td>
                                    <a href="{{ url('products', $wishlist->product_id) }}">{{ $wishlist->name }}  <i class="fas fa-arrow-circle-right"></i></a>
                                </td>
                                <td><span class="badge badge-success">$</span> {{ $wishlist->price }}</td>
                                <td>
                                    <a href="{{ route('addToCart', ['id' => $wishlist->product_id] ) }}" class="btn btn-sm btn-outline-success" title="Add to Cart"> <i class="fas fa-shopping-cart"></i> </a>
                                    <a href="{{ url( '/wishlist/remove', $wishlist->product_id ) }}" class="btn btn-sm btn-outline-danger" title="Remove from Wishlists"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
    
            @endif
        </div>
    </div>
@endsection