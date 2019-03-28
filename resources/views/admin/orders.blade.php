@extends('layouts.dashboard')

@section('title')
    Orders
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="p-2">
                {{ Form::open(['route' => 'getDate', 'method' => 'POST']) }}
                    <label class="h5" for="date">Pick Date: </label>
                    <input class="btn btn-outline border-success" value="asdf" type="date" name="date">
                    <button class="btn btn-success" type="submit">Submit</button>
                {{ Form::close() }}
                
            </div>
        </div>

        <div class="col-md-7">
            <div class="p-2">
                <p class="text-uppercase text-right h5">
                    @if (isset($date))
                        {{ $date }}
                    @endif
                    |
                    @if (isset($totalAmount))
                        total amount of selling: $ {{ $totalAmount }}
                    @endif 
                    <br>
                </p>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            @if (isset($orders))
            @foreach ($orders as $order)
                <div class="card text-dark shadow">
                    <div class="card-header">
                        {{ $order->created_at->format('h:i:s:A') }} <br>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                User Name: {{ $order->user->name }}
                            </div>
                            <div class="col-md-6">
                                Email: {{ $order->user->email }}
                            </div>    
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5>Orders:</h5>
                            </div>
                        </div>
                        @foreach ($order->cart->items as $item)
                        <div class="row">
                            <div class="col-md-6">
                                {{ $item['item']['name'] }} 
                            </div>
                            <div class="col-md-6">
                                <p>
                                {{ $item['qty'] }} @if ($item['qty'] == 1)
                                    Unit
                                @else
                                    Units
                                @endif
                                |
                                $ {{ $item['price'] }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p class="text-left">
                                    TOTAL QUANTITY: 
                                    {{ $order->cart->totalQty }} 
                                    @if ($order->cart->totalQty == 1)
                                        Unit
                                    @else
                                        Units
                                    @endif
                                </p> 
                            </div>

                            <div class="col-md-3">  
                                <p>TOTAL PRICE: $ {{ $order->cart->totalPrice }}</p>
                            </div>

                            <div class="col-md-3">
                                <p class="text-right">
                                    @if ($order->is_delivered == false)
                                        <span class="text-danger">Not Yet Delivered!</span>
                                    @else
                                        <span class="text-success">Delivered!</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            @endif
        </div>
    </div>
@endsection