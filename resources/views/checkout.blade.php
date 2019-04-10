@extends('layouts.layout')

@section('title')
    Checkout
@endsection

@section('content')
<div class="container mb-5">

    <div class="row mt-3">
        <div class="col-md-12 p-4">
            <div class="clearfix">
                <h5 class="float-left pb-3">Total Price: $ {{ $total }}</h5>
                <h5 class="float-right pb-3">Your Balance: $ {{ $user->credit_points }}</h5>
            </div>
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div>   
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Total Price</td>
                            <td>Quantity</td>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <a href="{{ url('products', $product['item']['id']) }}">{{ $product['item']['name'] }} <span class="fas fa-arrow-circle-right"></span></a>
                            </td>
                            <td>$ {{ $product['price'] }}</td>
                            <td>{{ $product['qty'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div> 
    
        <div class="col-md-12">
            <div class="pb-2">
                <h5>Delivery Information</h5>
            </div>
            <div>
                {{ Form::model($user, ['url' => 'checkout', 'method' => 'POST', 'id' => 'checkout-form']) }}
                    <div class="form-group w-50">
                        <label for="phone">Phone Number</label>
                        {{ Form::text('phone', null, ['class' => ($errors->has('phone') ? 'form-control is-invalid' : 'form-control'), 'id' => 'phone'])}}
                        @if($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $errors->first('phone')}} </strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group w-50">
                        <label for="address">Address</label>
                        {{ Form::textarea('address', NULL, ['class' => ($errors->has('address') ? 'form-control is-invalid' : 'form-control'), 'rows' => '2', 'id' => 'address', 'placeholder' => 'For Example: House #123, Street #123, #A Road'])}}
                        @if($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $errors->first('address')}} </strong>
                            </span>
                        @endif
                    </div>
                    <button class="btn btn-success" type="submit">Buy Now <i class="fas fa-shopping-cart"></i></button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
    
@endsection

