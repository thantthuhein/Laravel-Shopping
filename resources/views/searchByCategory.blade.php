@extends('layouts.layout')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <h5 class="mt-3">{{ $category->name }}</h5>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            @if ($products->isEmpty())
                <h1 class="mt-5 text-center">
                    There is No Products ! <i class="fas fa-frown"></i>
                </h1>
            @else    
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Quantities In Store</th>
                            <td>Description</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ url('products', $product->id) }}">{{ $product->name }}</a>  
                                </td>
                                <td><span class="badge badge-success">$</span> {{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection