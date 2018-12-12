@extends('layout')

@section('content')
    <h3>Edit Product - {{ $product->name }}</h3>
    
    <hr>
    
    {{ Form::model($product, [
        'route' => ['products.update', $product->id],
        'method' => "PUT"
    ]) }}

        @include('products.form')

        <div class="form-group">
            <label>Category</label>
            {{ Form::select('category_id[]', $categories, $selected_categories,  [
                'class' => "form-control",
                'multiple' => 'multiple'
            ]) }}
        </div>

        <button class="btn btn-primary">Update Product</button>
    {{ Form::close() }}
@endsection