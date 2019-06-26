@extends('layouts.dashboard')

@section('title')
    Total Orders   
@endsection

@section('content')
    <div class="container">

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                @if ($orders->isEmpty())
                    <h1 class="text-center text-uppercase">No Orders</h1>
                @else
                    <h3 class="mt-3 pb-3">Ordered Items & Details</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>Customer Name</td>
                                <td>Time</td>
                                <td>Total Quantity</td>
                                <td>Total Price</td>
                                <td>Ordered Items</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)    
                            <tr>
                                <td>
                                    <a href="{{ url('/dashboard/userDetails', $order->user->id) }}">{{ $order->user->name }}</a>
                                </td>
                                <td>
                                    {{ $order->created_at->format('d/M/Y , h:i:a') }}
                                </td>
                                <td>
                                    {{ $order->cart->totalQty }} 
                                    @if ($order->cart->totalQty > 1)
                                        items 
                                    @else
                                        item
                                    @endif
                                </td>
                                <td>
                                    $ {{ $order->cart->totalPrice }}
                                </td>
                                <td>
                                    @foreach ($order->cart->items as $item)
                                    <p>
                                        {{ $item['item']['name'] }} |
                                        {{ $item['qty'] }} items |
                                        $ {{ $item['price'] }}  
                                    </p>
                                    @endforeach    
                                </td>
                                <td>
                                    @if ($order->is_delivered == TRUE)
                                        <span class="text-success">Delivered!</span>
                                    @else
                                        <span class="text-danger">Not Yet Delivered!</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $orders->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection