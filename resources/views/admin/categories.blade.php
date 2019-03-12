@extends('layouts.dashboard')

@section('title')
    Categories   
@endsection

@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="clearfix">
                <h3 class="float-left">Categories</h3>      
                <p class="float-right">Create New <a class="btn btn-success mr-auto hvr-grow" href="{{route('categories.create')}}"><i class="fas fa-plus-square"></i></a></p>
            </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <table class="table table-bordered table-hover shadow">
                <thead class="top-bar text-light">
                    <tr>
                        <th><h5>Category Name</h5></th>
                        <th><h5>Actions</h5></th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                    <tr>
                        <th> {{$category->name}}</th>
                        <th> 
                        <a class="btn btn-info hvr-grow" href=" {{route('categories.show', $category->id)}}" data-toggle="tooltip" data-placement="top" title="details"><i class="fas fa-info-circle"></i></a>
                        {{ Form::model($categories, [
                            'route' => ['categories.destroy', $category->id], 
                            'method' => "DELETE",
                            'class' => 'd-inline'
                            ]) }}
                            <a class="btn btn-dark hvr-grow" href=" {{route('categories.edit', $category->id)}} " data-toggle="tooltip" data-placement="top" title="edit"><i class="fas fa-edit"></i></a>

                            <button data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger hvr-grow"><i class="fas fa-trash-alt"></i></button>
                        {{ Form::close() }}

                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
