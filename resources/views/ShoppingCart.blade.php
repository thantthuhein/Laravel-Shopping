 @extends('layouts.layout')

@section('content')
    <div class="container">
        <h3 class="mt-4">Shopping Cart </h3> 
        @if(Session::has('cart'))
        <div class="row mt-5 mb-0 pb-0">
            @foreach ($products as $product)
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item shadow">
                        <strong>{{ $product['item']['name'] }}</strong>
                        <br><hr>
                        Quantity: <span class="badge">{{ $product['qty'] }}</span>
                        <br><hr>
                        Total: <span class="badge badge-success"> $ </span> {{ $product['price'] }}
                        <br><hr>
                        <div>
                            <a class="btn btn-dark" href="{{ route('addToCart', $product['item']['id'] ) }}"><i class="fas fa-chevron-up"></i></a>
                            <a class="btn btn-dark" href=""><i class="fas fa-chevron-down"></i></a>
                            <a class="btn btn-dark" href="">Clear</a>
                        </div>
                    </li>
                    <hr>
                </ul>
            </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col">
                <strong>Total Price: $ {{ $totalPrice }}</strong>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-success" href="{{ route('checkout') }}">Checkout</a>
            </div>
        </div>
        @else
        <div class="row m-5 p-5 shadow">
            <div class="col">
                <p>Your Shopping Cart is Empty <i class="fas fa-smile"></i> <br><a class="noTextDecoration" href="{{ url('/') }}">Find Out Some Products!!!</a></p>
            </div>
        </div>
        @endif
        <hr>
    </div>
@endsection