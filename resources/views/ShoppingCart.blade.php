 @extends('layouts.layout')

@section('title')
    Shopping Cart
@endsection

@section('content')
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="col-md-4">
                @if (Session::has('cart'))
                    <h3 class="p-3">Shopping Cart </h3>    
                @endif
            </div>
            <div class="col-md-8">
                @if (Session::has('error'))
                    <div class="alert alert-danger h-75">
                        {{ Session::get('error') }}
                        <a href="" class="float-right text-danger pr-1"><i class="fas fa-times"></i></a>
                    </div>
                @endif

            </div>
        </div>
        
        
        @if(Session::has('cart'))
        <div class="row mt-3 mb-0 pb-0">
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