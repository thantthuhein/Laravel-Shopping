 @extends('layouts.layout')

@section('title')
    Shopping Cart
@endsection

@section('content')
    <div class="container-fluid">
        @if (Session::has('cart'))
            <h1 class="mt-4 mb-4 text-left">Shopping Cart </h1>    
        @endif
        <div class="row">
            <div class="col-md-3">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
        </div>
        @if(Session::has('cart'))
        <div class="row mt-2 mb-0 pb-0">
            <div class="col-md-12">
                <table class="table table-bordered table-hover shadow">
                    <thead class="top-bar text-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th>
                                <a href="{{ url('products', $product['item']['id']) }}">{{ $product['item']['name'] }} <span class="fas fa-arrow-circle-right"></span></a>
                            </th>
                            <th>
                                <span class="badge badge-success"> $ </span> {{ $product['item']['price'] }}
                            </th>
                            <th>{{ $product['qty'] }}</th>
                            <th>
                                <a class="btn btn-sm btn-success" href="{{ route('addToCart', $product['item']['id'] ) }}"><i class="fas fa-chevron-up"></i></a>
                                <a class="btn btn-sm btn-success" href="{{ url('/cart/reduceOne', $product['item']['id']) }}"><i class="fas fa-chevron-down"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{ url('/cart/reduceAll', $product['item']['id']) }}">Clear</a>
                            </th>
                            <th>
                                <span class="badge badge-success"> $ </span> {{ $product['price'] }}
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="clearfix mt-4">
            <div class="float-left">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Total Price</th>
                        <th><h5> <span class="badge badge-success">$</span> {{ $totalPrice }}</h5></th>
                    </tr>
                    
                </table>
                <a class="btn btn-lg btn-success" href="{{ route('checkout') }}">Proceed to Checkout</a>
            </div>
        </div>
        @else
        <div class="row m-5 p-5">
            <div class="col-md-12">
                <p class="text-dark text-center h1">
                    Your Shopping Cart is Empty <i class="fas fa-frown"></i> 
                </p>
                <p class="text-center">
                    <a class="noTextDecoration" href="{{ url('/') }}">Find Out Some Products!!!</a>
                </p>
            </div>
        </div>
        @endif
    </div>
@endsection