@extends('layouts.layout')

@section('title')
    Prepaid Points Details
@endsection 

@section('content')
    <div class="row m-0 mt-4">
        <div class="col-md-12">
            <h5 class="text-center">Prepaid Cards Details</h5>
        </div>
    </div>

    <div class="row m-0 p-5">
        <div class="col-md-3">
            <div class="shadow p-5 details card border border-secondary">
                <p class="text-center">
                    Current Prepaid Points
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
            @if ($purchasedCards->isEmpty())
                <h5 class="text-center">None ! </h5>
            @else    
                @foreach ($purchasedCards as $card)
                    <div class="card">
                        <div class="card-header">
                            {{ $card->purchased_at }}
                        </div>
                        <div class="card-body">
                            <p class="text-dark">
                                $ {{ $card->value }}
                            </p>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>


        <div class="col-md-9">
            <div>
                <h3>My Orders</h3>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif  
            </div>
            @if ($orders->isEmpty() == FALSE)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Ordered Items</td>
                            <td>Time</td>
                            <td>Total Quantity</td>
                            <td>Totoal Price</td>
                            <td>Delivery status</td>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    @foreach ($order->cart->items as $item)
                                        <p>
                                            {{ $item['item']['name'] }} |
                                            {{ $item['qty'] }} 
                                            @if ($item['qty'] > 1)
                                            Units
                                            @else
                                            Unit
                                            @endif | 
                                            $ {{ $item['price'] }}        
                                        </p>
                                    @endforeach      
                                </td>
                                <td>
                                    {{ $order->created_at->format('M, d ,Y| g:i:A') }}
                                </td>
                                <td>
                                    {{ $order->cart->totalQty }} 
                                    @if ($order->cart->totalQty > 1)
                                        Units
                                    @else
                                        Unit
                                    @endif
                                </td>
                                <td>
                                    $ {{ $order->cart->totalPrice }}
                                </td>
                                <td>
                                    @if ($order->is_delivered == false)
                                        <p class="text-danger">No ! 
                                            <a class="btn btn-outline-success btn-sm" href="{{ url('/getDeliver', $order->id) }}">Yes ?</a>
                                        </p>
                                    @else
                                        <p class="text-success">Delivered!</p>
                                    @endif        
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1 class="text-center p-5 mt-3 text-info">You Don't have any Orders yet! <i class="fas fa-frown"></i></h1>
            @endif
        </div>
    </div>

@endsection 
