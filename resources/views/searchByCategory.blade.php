@extends('layouts.layout')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($products->isEmpty())
                <h1 class="mt-5 text-center">
                    There is No Products ! <i class="fas fa-frown"></i>
                </h1>
            @else    
                <table class="table table-hover shadow">
                    <thead class="bg-info">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th>{{ $product->name }}</th>
                                <th>$ {{ $product->price }}</th>
                                <th>{{ $product->quantity }}</th>
                                <th>{{ $product->description }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection