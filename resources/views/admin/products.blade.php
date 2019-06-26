@extends('layouts.dashboard')

@section('title')
    Products   
@endsection

@section('content') 
  <div class="row mt-2">
    <div class="col-md-12">
      <div class="clearfix">
        <h3 class="float-left">Products in Store</h3>      
        <p class="float-right">Create New <a class="btn btn-success mr-auto hvr-grow" href="{{route('products.create')}}"><i class="fas fa-plus-square"></i></a></p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
              <tr>
                <td>Product Name</td>
                <td>Actions</td>
            </tr>
            </thead>
            @foreach($products as $product)
              <tr>
                <td> {{$product->name}}</td>
                <td> 
                  {{ Form::model($products, [
                    'route' => ['products.destroy', $product->id], 
                    'method' => "DELETE",
                    'class' => 'd-inline'
                      ]) }}
                      <a class="btn btn-outline-dark mr-2" href=" {{route('products.edit', $product->id)}} "data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                     <button data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                  {{ Form::close() }}

                </td>
              </tr>
            @endforeach
        </table>
    </div>
  </div>
@endsection