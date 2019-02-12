@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <h3>Create New Product</h3>
    <hr>
    {{ Form::open(['route' => 'products.store', 'method' => "POST"]) }}

        @include('products.form')

        <div class="form-group">
            <label>Category</label>
            {{ Form::select('category_id[]', $categories, null,  [
                'class' => "form-control",
                'multiple' => 'multiple'
            ]) }}
        </div>

        <button class="btn btn-primary">Create New Product</button>

    {{ Form::close() }}
    </div>
@endsection