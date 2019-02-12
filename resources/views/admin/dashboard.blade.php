@extends('layouts.dashboard')

@section('content') 
  <div class="row mt-5">
    <div class="col-md-8">
        <h3>Products in Store</h3>      
    </div>
    <div class="col-md-4">
        <form action="{{route('products.create')}}">
            <p class="d-inline mr-1">Create New Product</p>
            <button class="btn btn-success mr-auto hvr-grow"><i class="fas fa-plus-square"></i></button>
        </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 mr-auto">
        <br>
        <table class="table table-bordered table-hover">
            <tr>
                <th><h3>Product Name</h3></th>
                <th><h3>Price</h3></th>
                <th><h3>Actions</h3></th>
            </tr>
            @foreach($products as $product)
              <tr>
                <th> {{$product->name}}</th>
                <th> ${{$product->price}} </th>
                <th> 
                  <a class="btn btn-info hvr-grow mr-2" href=" {{route('products.show', $product->id)}}" data-toggle="tooltip" data-placement="top" title="details"><i class="fas fa-info-circle"></i></a>
                  {{ Form::model($products, [
                    'route' => ['products.destroy', $product->id], 
                    'method' => "DELETE",
                    'class' => 'd-inline'
                      ]) }}
                      <a class="btn btn-dark hvr-grow mr-2" href=" {{route('products.edit', $product->id)}} "data-toggle="tooltip" data-placement="top" title="profile"><i class="fas fa-edit"></i></a>

                     <button data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger hvr-grow"><i class="fas fa-trash-alt"></i></button>
                  {{ Form::close() }}

                </th>
              </tr>
            @endforeach
        </table>
    </div>
  </div>
@endsection