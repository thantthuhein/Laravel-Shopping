@extends('layout')

@section('content')
    <h3>Shopping Cart</h3>

    <hr>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product }}</td>
            </tr>
        @endforeach
    </table>
@endsection