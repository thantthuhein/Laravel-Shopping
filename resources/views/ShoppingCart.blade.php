 @extends('layouts.layout')

@section('title')
    Shopping Cart
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row mt-3">
            <div class="col-md-4 p-4">
                @if (Session::has('cart'))
                    <h5>Shopping Cart </h5>    
                @endif
            </div>
            <div class="col-md-8">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

            </div>
        </div>
        
        
        @if(Session::has('cart'))
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Item Price</td>
                            <td>Quantity</td>
                            <td>Action</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <a href="{{ url('products', $product['item']['id']) }}">{{ $product['item']['name'] }} <span class="fas fa-arrow-circle-right"></span></a>
                            </td>
                            <td>
                                <span class="badge badge-success"> $ </span> {{ $product['item']['price'] }}
                            </td>
                            <td>{{ $product['qty'] }}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="{{ route('addToCart', $product['item']['id'] ) }}"><i class="fas fa-chevron-up"></i></a>
                                <a class="btn btn-sm btn-outline-success" href="{{ url('/cart/reduceOne', $product['item']['id']) }}"><i class="fas fa-chevron-down"></i></a>
                                <a class="btn btn-sm btn-outline-danger" href="{{ url('/cart/reduceAll', $product['item']['id']) }}">Clear</a>
                            </td>
                            <td>
                                <span class="badge badge-success"> $ </span> {{ $product['price'] }}
                            </td>
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
                <a class="btn btn-success" href="{{ route('checkout') }}">Proceed to Checkout</a>
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