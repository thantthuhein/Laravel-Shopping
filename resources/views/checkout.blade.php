@extends('layouts.layout')

@section('title')
    Checkout
@endsection

@section('content')
       <div class="row justify-content-center mt-1 p-2">
            <div class="col-md-6">
                <h1>Checkout</h1>
                <h5>Total: $ {{ $total }}</h5>
                {{ Form::open(['route' => 'checkout', 'method' => 'POST', 'id' => 'checkout-form']) }}
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                {{ Form::text('name', null, ['class' => ($errors->has('name') ? 'form-control is-invalid' : 'form-control'), 'id' => 'name'])}}
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('name')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                {{ Form::text('address', null, ['class' => ($errors->has('address') ? 'form-control is-invalid' : 'form-control'), 'id' => 'address'])}}
                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('address')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="card-name">Card Holder Name</label>
                                {{ Form::text('card-name', null, ['class' => ($errors->has('card-name') ? 'form-control is-invalid' : 'form-control'), 'id' => 'card-name'])}}
                                @if($errors->has('card-name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('card-name')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="card-number">Credit Card Number</label>
                                {{ Form::text('card-number', null, ['class' => ($errors->has('card-number') ? 'form-control is-invalid' : 'form-control'), 'id' => 'card-number'])}}
                                @if($errors->has('card-number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('card-number')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="card-expiry-month">Card Expiration Month</label>
                                        {{ Form::text('card-expiry-month', null, ['class' => ($errors->has('card-expiry-month') ? 'form-control is-invalid' : 'form-control'), 'id' => 'card-expiry-month'])}}
                                        @if($errors->has('card-expiry-month'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong> {{ $errors->first('card-expiry-month')}} </strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="card-expiry-year">Card Expiration Year</label>
                                        {{ Form::text('card-expiry-year', null, ['class' => ($errors->has('card-expiry-year') ? 'form-control is-invalid' : 'form-control'), 'id' => 'card-expiry-year'])}}
                                        @if($errors->has('card-expiry-year'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong> {{ $errors->first('card-expiry-year')}} </strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="card-cvc">CVC</label>
                                {{ Form::text('card-cvc', null, ['class' => ($errors->has('card-cvc') ? 'form-control is-invalid' : 'form-control'), 'id' => 'card-cvc'])}}
                                @if($errors->has('card-cvc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('card-cvc')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success" type="submit">Buy Now <i class="fas fa-shopping-cart"></i></button>
                {{ Form::close() }}

           </div>
       </div>
       <hr>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>   
    <script src="{{ asset('js/checkout.js') }}"></script>
@endsection