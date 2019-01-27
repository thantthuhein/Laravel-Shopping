@extends('layout')

@section('title')
    <title>Index</title>
@endsection
@section('content')
    <div class="container mt-5">
        <h3>Categories</h3>
    
        <a class="btn btn-primary" href="{{ route('categories.create')}}">Create Category</a>
        <hr>

        <table class="table table-bordered table-hover">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>

            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        {{ Form::model($category, [ 
                            'route' => [ 'categories.destroy', $category->id],
                            'method' => 'DELETE'
                        ])}}
                            <a href="{{ url('categories', $category->id) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                        {{ Form::close()}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection