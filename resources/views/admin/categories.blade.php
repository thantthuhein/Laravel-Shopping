@extends('layouts.dashboard')

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <h3>Categories</h3>
        </div>
        <div class="col-md-4">
            <form action=" {{route('categories.create')}} ">
                <p class="d-inline mr-1">Create New Category</p>
                <button class="btn btn-success mr-auto hvr-grow"><i class="fas fa-plus-square"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mr-auto">
            <br>
            <table class="table table-bordered table-hover">
                <tr>
                    <th><h5>Category Name</h5></th>
                    <th><h5>Actions</h5></th>
                </tr>
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
