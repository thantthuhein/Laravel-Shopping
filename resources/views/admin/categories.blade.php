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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Category Name</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                    <tr>
                        <td> {{$category->name}}</td>
                        <td> 
                        <a class="btn btn-outline-info" href=" {{route('categories.show', $category->id)}}" data-toggle="tooltip" data-placement="top" title="details"><i class="fas fa-info-circle"></i></a>
                        {{ Form::model($categories, [
                            'route' => ['categories.destroy', $category->id], 
                            'method' => "DELETE",
                            'class' => 'd-inline'
                            ]) }}
                            <a class="btn btn-outline-dark" href=" {{route('categories.edit', $category->id)}} " data-toggle="tooltip" data-placement="top" title="edit"><i class="fas fa-edit"></i></a>

                            <button data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                        {{ Form::close() }}

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
