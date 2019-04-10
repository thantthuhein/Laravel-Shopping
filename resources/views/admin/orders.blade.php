@extends('layouts.dashboard')

@section('title')
    Orders
@endsection

@section('links')
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="p-2">
                {{ Form::open(['route' => 'getDate', 'method' => 'POST']) }}
                    <div class="form-group">
                        <label class="h5" for="date">Pick Date: </label>
                        <input class="btn btn-outline border-success" placeholder="pick" type="date" name="date">
                        <button class="btn btn-outline-success" type="submit">Submit</button>
                    </div>
                {{ Form::close() }}

            </div>
        </div>

        <div class="col-md-7">
            <div class="p-2">
                <p class="text-uppercase text-right h5">
                    @if (isset($date))
                        {{ $date }}
                    @endif
                    @if (isset($totalAmount))
                        | total amount of selling: $ {{ $totalAmount }}
                    @endif 
                    <br>
                </p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if (isset($orders))    
                @if ( $orders->isNotEmpty() )
                    <table class="table table-hover">
                        <thead>
                            <td>Customer</td>
                            <td>Ordered Items</td>
                            <td>Time</td>
                            <td>Total Quantity</td>
                            <td>Total Price</td>
                            <td>Delivery Status</td>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <a href="{{ url('/dashboard/userDetails', $order->user->id) }}">
                                            {{ $order->user->name }}
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @foreach ($order->cart->items as $item)
                                            <p>
                                                {{ $item['item']['name'] }} |
                                                {{ $item['qty'] }} 
                                                @if ( 1 == $item['qty'])
                                                    unit
                                                @else
                                                    units
                                                @endif
                                                |
                                                $ {{ $item['price'] }}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $order->created_at->format('h:i:A') }}
                                    </td>
                                    <td>
                                        {{ $order->cart->totalQty }} 
                                        @if ($order->cart->totalQty == 1)
                                            Unit
                                        @else
                                            Units
                                        @endif
                                    </td>
                                    <td>
                                        $ {{ $order->cart->totalPrice }}
                                    </td>
                                    <td>
                                        @if ($order->is_delivered == false)
                                        <span class="text-danger">Not Yet Delivered!</span>
                                        @else
                                            <span class="text-success">Delivered!</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                @else
                    <h3>
                        No Orders Today!
                    </h3>
                    <h5>
                        @if (isset($date))
                            {{ $date }}
                        @endif
                    </h5>
                @endif
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    {{-- test --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(
            var date = $("input[name='date']");
            date.datepicker();
        );
    </script>                                                                                 
@endsection