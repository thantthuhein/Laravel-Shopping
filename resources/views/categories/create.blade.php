@extends('layouts.layout')

@section('title')
    <title>Create Category</title>
@endsection

@section('content')
    <div class="container mt-5">
        <h3>Create Category</h3>

        <hr>
    
        {{ Form::open(['route' => 'categories.store', 'method' => "POST"])}}
            <div class="form-group">
                <label>Name</label>
                {{ Form::text('name', null, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                <label>Description</label>
                {{ Form::textarea('description', null, ['class' => 'form-control'])}}
            </div>

            <button class="btn btn-primary">Create New Category</button>
        {{ Form::close()}}
    </div>
@endsection