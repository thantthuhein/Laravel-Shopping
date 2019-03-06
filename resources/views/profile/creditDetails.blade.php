@extends('layouts.layout')

@section('title')
    Credit Details
@endsection 

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <h5 class="text-center">Credits Details</h5>
        </div>
    </div>

    <div class="row p-5">
        <div class="col-md-3">
            <div class="shadow p-5 details card border border-secondary">
                <p class="text-center">
                    Credit Points
                </p>
                <h1 class="text-center">
                    $ {{ auth()->user()->credit_points }}
                </h1>
            </div>
            <br>
            <a href="{{ url('/getEnterPin') }}" class="btn btn-primary">Top up Points</a>
            <hr>
            <h5 class="mt-3">Points Top Up History</h5>
            <hr>
            @foreach ($purchasedCards as $card)
                <div class="card shadow">
                    <div class="card-header">
                        {{ $date }}
                    </div>
                    <div class="card-body">
                        <p class="text-dark">
                            $ {{ $card->value }}
                        </p>
                    </div>
                </div>
                <br>
            @endforeach
        </div>


        <div class="col-md-9">
            <div>
                <h3>My Orders</h3>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif  
            </div>
            <hr>
            @if ($orders->isEmpty() == FALSE)
                @foreach ($orders as $order)
                <div class="card shadow">
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
            @else
                <h1 class="text-center p-5 mt-3 text-info">You Don't have any Orders yet! <i class="fas fa-frown"></i></h1>
            @endif
        </div>
    </div>

@endsection 