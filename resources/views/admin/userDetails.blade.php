@extends('layouts.dashboard')

@section('title')
    Details | {{ $user->name }}
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Orders & Prepaid History</h5>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Current Points</td>
                        <td>Address</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->phone == NULL)
                            <td class="text-muted">NONE</td>
                        @else
                            <td>{{ $user->phone }}</td>
                        @endif
                        <td>$ {{ $user->credit_points }}</td>
                        @if ($user->address == NULL)
                            <td class="text-muted">NONE</td>
                        @else
                            <td>{{ $user->address }}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-3">
            <h5 class="mt-3 text-center">Top Up History</h5>
            <hr>
            @if ($purchasedCards->isEmpty())
                <h5 class="text-center">None !</h5>
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
                <h5 class="mt-3 text-center">Orders History</h5>
                <hr>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif  
            </div>
            
            @if ($orders->isEmpty() == FALSE)
                @foreach ($orders as $order)
                    <div class="clearfix pb-3">
                        <h5 class="float-left">{{ $order->created_at->format('d, D, M, Y') }}</h5>
                        <h5 class="float-right">{{ $order->created_at->format('g:i:A') }} </h5>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Ordered Items</td>
                                <td>Total Quantity</td>
                                <td>Total Price</td>
                                <td>Delivery Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @foreach ($order->cart->items as $item)
                                        <p>
                                            <a href="{{ url('products', $item['item']['id']) }}">
                                                {{ $item['item']['name'] }} 
                                            </a>
                                            |
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
                                    <p class="text-danger">
                                        Not Yet Delivered! 
                                    </p>
                                    @else
                                        <p class="text-success">Delivered!</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="mt-4">
                @endforeach
            @else
                <h1 class="text-center p-5 mt-3 text-info">No Orders  ! <i class="fas fa-frown"></i></h1>
            @endif
        </div>
    </div>

@endsection