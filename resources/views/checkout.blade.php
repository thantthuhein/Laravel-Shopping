@extends('layouts.layout')

@section('title')
    Checkout
@endsection

@section('content')
       <div class="row justify-content-center mt-1 p-2">
            <div class="col-md-6">
                <h1>Checkout</h1>
                <h5>Total: $ {{ $total }}</h5>
                <div id="charge-error" class="alert alert-danger{{ !Session::has ('error') ? 'hidden' : ''}}" >
                    {{ Session::get('error') }}
                </div>
                {{ Form::model($user, ['url' => 'checkout', 'method' => 'POST', 'id' => 'checkout-form']) }}
                    <div class="row">
                        {{ Auth::user()->address }}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                {{ Form::text('address', NULL, ['class' => ($errors->has('address') ? 'form-control is-invalid' : 'form-control'), 'id' => 'address', 'placeholder' => 'For Example: House #123, Street #123, #A Road'])}}
                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('address')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                {{ Form::number('phone', null, ['class' => ($errors->has('phone') ? 'form-control is-invalid' : 'form-control'), 'id' => 'phone'])}}
                                @if($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('phone')}} </strong>
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
       <div class="row p-3 m-3">
            <div class="col-md-12">
                <p>
                    @if (1 == $totalQty)
                        {{ $totalQty }} Item
                    @else
                        {{ $totalQty }} Items
                    @endif
                </p>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <th><p>{{ $product['item']['name'] }}</p></th>
                            <th><p>$ {{ $product['price'] }}</p></th>
                            <th><p>{{ $product['qty'] }}</p></th>
                        </tr>
                    @endforeach
                </table>
            </div>
       </div>
@endsection

