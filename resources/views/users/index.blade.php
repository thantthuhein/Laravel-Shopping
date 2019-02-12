@extends('layouts.layout')

@section('title')
    <title>Index</title>
@endsection
@section('content')
    <div class="container mt-5">
        <h3>users</h3>
    
        <hr>

        <table class="table table-bordered table-hover">
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Actions</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ Form::open([ 
                            'url' => [ 'users/destroy', $user->id],
                            'method' => 'DELETE'
                        ])}}
                            <a href="{{ url('users') }}" class="btn btn-primary">Show</a>
                            <button class="btn btn-danger">Delete</button>
                        {{ Form::close()}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection