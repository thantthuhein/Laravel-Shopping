@extends('layouts.layout')

@section('title')
    Checkout
@endsection

@section('content')

<div class="row p-4">
    <div class="col-md-6">
        <div class="pb-2">
            <h5>Delivery Information</h5>
        </div>
        <div class="shadow p-4">
            {{ Form::model($user, ['url' => 'checkout', 'method' => 'POST', 'id' => 'checkout-form']) }}
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    {{ Form::text('phone', null, ['class' => ($errors->has('phone') ? 'form-control is-invalid' : 'form-control'), 'id' => 'phone'])}}
                    @if($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('phone')}} </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    {{ Form::textarea('address', NULL, ['class' => ($errors->has('address') ? 'form-control is-invalid' : 'form-control'), 'rows' => '3', 'id' => 'address', 'placeholder' => 'For Example: House #123, Street #123, #A Road'])}}
                    @if($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('address')}} </strong>
                        </span>
                    @endif
                </div>
                <button class="btn btn-lg btn-success mt-3" type="submit">Buy Now <i class="fas fa-shopping-cart"></i></button>
            {{ Form::close() }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="clearfix pb-2">
            <h5 class="float-left">Total Price: $ {{ $total }}</h5>
            <h5 class="float-right">Your Balance: $ {{ $user->credit_points }}</h5>
        </div>
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="shadow">
            <table class="table table-bordered table-hover">
                <thead class="top-bar text-light">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                @foreach ($products as $product)
                    <tr>
                        <th>
                            <a href="{{ url('products', $product['item']['id']) }}">{{ $product['item']['name'] }} <span class="fas fa-arrow-circle-right"></span></a>
                        </th>
                        <th>$ {{ $product['price'] }}</th>
                        <th>{{ $product['qty'] }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div> 
</div>
    
@endsection

