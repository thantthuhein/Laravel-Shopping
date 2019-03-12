@extends('layouts.dashboard')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <table class="table table-hover">
                    <thead class="top-bar text-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Current Credit Points</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            @if ($user->phone == NULL)
                                <th class="text-muted">NONE</th>
                            @else
                                <th>0 {{ $user->phone }}</th>
                            @endif
                            <th>$ {{ $user->credit_points }}</th>
                            @if ($user->address == NULL)
                                <th class="text-muted">NONE</th>
                            @else
                                <th>{{ $user->address }}</th>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div class="row mt-4">
        <div class="col-md-12">
            <h5 class="text-center">Credits Details</h5>
        </div>
    </div>

    <div class="row p-5">
        <div class="col-md-3">
            <h5 class="mt-3 text-center">Points Top Up History</h5>
            <hr>
            @if ($purchasedCards->isEmpty())
                <h5 class="text-center">None !</h5>
            @else
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
            @endif
        </div>


        <div class="col-md-9">
            <div>
                <h3 class="text-center">Orders History</h3>
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
                                <p class="text-danger">
                                    Not Yet Delivered! 
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
                <h1 class="text-center p-5 mt-3 text-info">No Orders  ! <i class="fas fa-frown"></i></h1>
            @endif
        </div>
    </div>

@endsection