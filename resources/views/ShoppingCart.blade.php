 @extends('layouts.layout')

@section('content')
    <div class="container">
        <h3 class="mt-4">Shopping Cart </h3> 
        @if(Session::has('cart'))
        <div class="row mt-5 mb-0 pb-0">
            total:
            {{ session()->get('cart')->totalQty }}
            @foreach ($products as $product)
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item shadow">
                        <strong>{{ $product['item']['name'] }}</strong>
                        <br><hr>
                        Quantity: <span class="badge">{{ $product['qty'] }}</span>
                        <br><hr>
                        Price: $ <span class="badge badge-success">{{ $product['price'] }}</span>
                        <br><hr>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Reduce <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="">Reduce by 1</a>
                                <a class="dropdown-item" href="">Clear All Items</a>
                            </div>
                            <a class="btn btn-primary" href="{{ route('addToCart', $product['item']['id'] ) }}">Increase</a>
                        </div>
                    </li>
                    <hr>
                </ul>
            </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col">
                <strong>Total: $ {{ $totalPrice }}</strong>
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