@extends('layouts.dashboard')

@section('title')
    Total Orders   
@endsection

@section('content')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            @if ($orders->isEmpty())
                <h1 class="text-center text-uppercase">No Orders</h1>
            @else
                <h3 class="mt-3 pb-3">Ordered Items & Details</h3>
                <table class="table table-hover table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Customer Name</th>
                            <th>Time</th>
                            <th>Total Quantity</th>
                            <th>Total Price</th>
                            <th>Ordered Items</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)    
                        <tr>
                            <th>
                                <a href="{{ url('/dashboard/userDetails', $order->user->id) }}">{{ $order->user->name }}</a>
                            </th>
                            <th>
                                {{ $order->created_at->format('D.d.M.Y | h:i:a') }}
                            </th>
                            <th>
                                {{ $order->cart->totalQty }} 
                                @if ($order->cart->totalQty > 1)
                                    items 
                                @else
                                    item
                                @endif
                            </th>
                            <th>
                                $ {{ $order->cart->totalPrice }}
                            </th>
                            <th>
                                @foreach ($order->cart->items as $item)
                                <p>
                                    {{ $item['item']['name'] }} |
                                    {{ $item['qty'] }} items |
                                    $ {{ $item['price'] }}  
                                </p>
                                @endforeach    
                            </th>
                            <th>
                                @if ($order->is_delivered == TRUE)
                                Delivered!
                                    <span class="text-success"></span>
                                @else
                                    <span class="text-danger">Not Yet Delivered!</span>
                                @endif
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($orders as $order)
                    <div class="card shadow mb-5">
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
                                {{ $item['item']['name'] }} |
                                {{ $item['qty'] }} items |
                                $ {{ $item['price'] }}  
                            </p>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <div class="clearfix">
                                <h5 class="float-left">Total Quantity: 
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
            @endif
        </div>
    </div>
@endsection