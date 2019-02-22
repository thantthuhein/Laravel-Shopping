@extends('layouts.layout')

@section('title')
    Profile
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 text-center">
            <img class="rounded-circle" src="https://via.placeholder.com/150" alt="">
            <br> 
            <p class="mt-3 mb-4">
                {{ $user->name }} 
                @if (auth()->user()->is_Admin == TRUE)
                    <span><i class="fas fa-star"></i></span>
                @endif
                . <span class="text-muted">{{ $user->email }}</span>
                <br>
                Member Since: {{ $user->created_at->format('d. D. M. Y') }}
            </p>
        </div>
    </div>
    <div class="container  border_radius_40 shadow p-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-6">
                <p>
                    User Name: <span class="text-uppercase">{{ $user->name }}</span> | 
                    <a class="" href="">change <i class="fas fa-edit"></i></a>
                </p>
            </div>
            <div class="col-md-6">
                Email Address: {{ $user->email }} | 
                <a class="" href="">change <i class="fas fa-edit"></i></a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center m-0">
            <div class="col-md-6">
                <p>
                    Phone Number:
                    @if ($user->phone == NULL)
                        <span class="text-uppercase text-muted">None</span> | 
                        <a class="" href="">enter your phone number <i class="fas fa-phone"></i></a>
                    @else
                        <span>{{ $user->phone }}</span> |
                        <a class="" href="">change <i class="fas fa-edit"></i></a>
                    @endif 
                </p>
            </div>
            <div class="col-md-6">
                Address: 
                @if ($user->address == NULL)
                    <span class="text-uppercase text-muted">None</span> | 
                    <a class="" href="">enter your address <i class="fas fa-map-marker-alt"></i></a>
                @else    
                    {{ $user->address }} | 
                    <a class="" href="">change <i class="fas fa-edit"></i></a>
                @endif
            </div>
        </div>
        <hr>
        <div class="row m-0">
            <div class="col-md-6">
                @if ($user->is_verify == NULL)
                    Your Email is not Verified yet! <a href="">Verify Your Email Now</a>
                @else
                    <p class="text-muted">Verified</p>
                @endif
            </div>
            <div class="col-md-6">
                @if (auth()->user()->is_Admin == TRUE)
                    <a href="{{ url('dashboard') }}" class="btn btn-primary">Dashboard <i class="fas fa-arrow-right"></i></a>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 m-0">
                <h3>Ordered Items</h3>
                <br>
                @foreach ($orders as $order)
                    <div class="card border-success text-success">
                        <div class="card-header">
                            <p class="card-title">{{ $order->created_at->format('d, D, M, Y') }}</p>
                            <p class="card-title">
                                {{ $order->created_at->format('g:i:A') }} 
                            </p>
                        </div>
                        @foreach ($order->cart->items as $item)
                            <div class="card-body m-0 p-3">
                                <p class="p-0 m-0">
                                    {{ $item['item']['name'] }} |
                                    {{ $item['qty'] }} 
                                    @if ($item['qty'] > 1)
                                    Units
                                    @else
                                    Unit
                                    @endif | 
                                    $ {{ $item['price'] }}  
                                </p>
                            </div>
                        @endforeach
                        <div class="card-footer">
                            <p>
                                Total: {{ $order->cart->totalQty }} 
                                @if ($order->cart->totalQty > 1)
                                    Units
                                @else
                                    Unit
                                @endif
                            </p>
                            <p>Total Price: $ {{ $order->cart->totalPrice }}</p>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>   
        </div>
    </div>
@endsection 