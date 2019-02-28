@extends('layouts.layout')

@section('title')
    Profile
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 text-center">
            @if (Session::has('success'))
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }} 
                    <a href="" class="btn btn-sm">x</a>
                </div>
            @endif
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
        </div>
    </div>
    <div class="container  border_radius_40 shadow p-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-6">
                <p>
                    User Name: <span class="text-uppercase">{{ $user->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                Email Address: {{ $user->email }} 
            </div>
        </div>
        <hr>
        <div class="row justify-content-center m-0">
            <div class="col-md-6">
                <p>
                    Phone Number:
                    @if ($user->phone == NULL)
                        <span class="text-uppercase text-muted">None</span> 
                    @else
                        <span>{{ $user->phone }}</span>
                    @endif 
                </p>
            </div>
            <div class="col-md-6">
                Address: 
                @if ($user->address == NULL)
                    <span class="text-uppercase text-muted">None</span> 
                @else    
                    {{ $user->address }} 
                @endif
            </div>
        </div>
        <hr>
        <div class="row pl-3">
            <div class="col-md-6">
                <div>
                    <a class="" href="{{ url('getChangeInfo') }}">Edit Info<i class="fas fa-edit"></i></a>
                </div>
            </div>
            @if (auth()->user()->is_Admin == TRUE)
                <div class="col-md-6">
                    <a class="btn btn-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                </div>
            @else
                
            @endif
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 m-0">
                <h3>Ordered Items</h3>
                <br>
                @foreach ($orders as $order)
                    <div class="card border-info">
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
                            <div class="clearfix">
                                @if ($order->is_delivered == false)
                                    <p class="text-danger">Not Yet Delivered! 
                                        <a class="btn btn-success btn-sm" href="{{ url('/getDeliver', $order->id) }}">Delivered?</a>
                                    </p>
                                @else
                                    <p class="text-success">Delivered!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>   
        </div>
    </div>
@endsection 

@section('scripts')
    <script>
    </script>
@endsection