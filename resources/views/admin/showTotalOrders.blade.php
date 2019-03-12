@extends('layouts.dashboard')

@section('title')
    Total Orders   
@endsection

@section('content')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-9">
            <h1>Total Orders</h1>
            @foreach ($orders as $order)
                <div class="card shadow mb-3">
                    <div class="card-header top-bar text-light">
                        <div class="clearfix">
                            <h3 class="float-left">{{ $order->created_at->format('D.d.M.Y | h:i:a') }}</h3>
                            <h3 class="float-right">Customer Name: 
                                <a class="link text-light" href="{{ url('/dashboard/userDetails', $order->user->id) }}">{{ $order->user->name }}</a>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($order->cart->items as $item)
                        <p>
                            {{ $item['item']['name'] }}
                            {{ $item['price'] }}
                            {{ $item['qty'] }}
                        </p>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <div class="clearfix">
                            <h5 class="float-left">Total Quantity: {{ $order->cart->totalQty }} 
                            @if ($order->cart->totalQty > 1)
                                items 
                            @else
                                item
                            @endif
                            |
                            Total Price: $ {{ $order->cart->totalPrice }}
                            </h5>
                            @if ($order->is_delivered == TRUE)
                                <h5 class="text-success float-right">Delivered!</h5>
                            @else
                                <h5 class="text-danger float-right">Not Yet Delivered!</h5>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection