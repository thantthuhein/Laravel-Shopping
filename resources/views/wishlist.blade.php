@extends('layout')

@section('content')
    <div class="container mt-5">
        <h3>Wish List</h3>
        <br>
        @if( session('wishlist'))
            @foreach (session('wishlist') as $id => $details)
                <p>{{ $details['name'] }}</p>
                <br>
                <a href=" {{ url('wishlist/remove', $id)}}" class="btn btn-danger">X</a>
                <hr>
            @endforeach
        @else
            <p>Wish List is Empty!</p>
        @endif    
    </div>    
@endsection