@extends('layout')

@section('content')
    <div class="container mt-5">
        <h3>Cart</h3>
        <br>
        @if( session('cart') )
            @foreach ( session('cart') as $id => $details )
            <div class="row shadow">
                <div class="col-10">
                    <p class="mt-3"> 
                        {{ $details['name'] }} 
                        <br>
                        {{ $details['description'] }} 
                        <br>
                        {{ $details['quantity'] }} 
                    </p>
                </div>
                <div class="col-2">
                    <a href=" {{url('cart/remove', $id)}}" class="btn btn-danger mt-3">Remove</a>
                </div>
            </div>
            <br>
            @endforeach
        @else 
            <p>Empty Cart!</p>
        @endif
    </div>
@endsection