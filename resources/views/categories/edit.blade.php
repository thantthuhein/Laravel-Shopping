@extends('layouts.layout')

@section('title')
    <title>Update Category</title>
@endsection

@section('content')
    <div class="container mt-5">
        <h3>Update Category</h3>

        <hr>

        {{ Form::model($category, [
            'route' => ['categories.update', $category->id],
            'method' => "PUT"
        ])}}

            <div class="form-group">
                {{ Form::label(null, 'Email Address')}}
                {{ Form::text('name', null, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                <label>Description</label>
                {{ Form::textarea('description', null, ['class' => 'form-control'])}}
            </div>

            <button class="btn btn-primary">Update Category</button>
        {{ Form::close()}}
    </div>
@endsection