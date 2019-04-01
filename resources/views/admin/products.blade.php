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
        <table class="table table-bordered table-hover shadow">
            <thead class="top-bar text-light">
              <tr>
                <th><h5>Product Name</h5></th>
                <th><h5>Actions</h5></th>
            </tr>
            </thead>
            @foreach($products as $product)
              <tr>
                <th> {{$product->name}}</th>
                <th> 
                  {{ Form::model($products, [
                    'route' => ['products.destroy', $product->id], 
                    'method' => "DELETE",
                    'class' => 'd-inline'
                      ]) }}
                      <a class="btn btn-dark hvr-grow mr-2" href=" {{route('products.edit', $product->id)}} "data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                     <button data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger hvr-grow"><i class="fas fa-trash-alt"></i></button>
                  {{ Form::close() }}

                </th>
              </tr>
            @endforeach
        </table>
    </div>
  </div>
@endsection