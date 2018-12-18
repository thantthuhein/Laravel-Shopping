@extends('layout')

@section('content')
    <h3>Create New Product</h3>
    
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
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
@endsection