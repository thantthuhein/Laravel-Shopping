@extends('layout')

@section('content')
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                {{ $category->name}}
            </div>
            <div class="card-body">
                {{ $category->description}}
            </div>
            <div class="card-footer">
                <a href="{{ url('categories') }}" class='btn btn-primary'>Back To Index</a>
            </div>
        </div>
    </div>

    
@endsection