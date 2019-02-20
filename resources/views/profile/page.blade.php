@extends('layouts.layout')

@section('title')
    Profile
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 text-center">
            <img class="rounded-circle" src="https://via.placeholder.com/150" alt="">
            <br> 
            <p class="mt-3 mb-4">{{ $user->name }} 
                @if (auth()->user()->is_Admin == TRUE)
                    <span><i class="fas fa-star"></i></span>
                @endif
                | <span class="text-muted">{{ $user->email }}</span></p>
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
                <h3>Your Orders List</h3>
                <br>
                @foreach ($orders as $order)
                    {{-- {{ dd( isset($order) ) }} --}}
                        @foreach ($order->cart->items as $item)
                            <tr>
                                <th>{{ $item['item']['name'] }}</th>
                                <th>{{ $item['price'] }}</th>
                                <th>{{ $item['qty'] }}</th>
                                <th>{{ $order->cart->totalPrice }}</th>
                                <th>{{ $order->cart->totalQty }}</th>
                                <th>{{ $order->created_at }}</th>
                            </tr>                                           
                        @endforeach
                    @endforeach
            </div>   
        </div>
    </div>
@endsection 