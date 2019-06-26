@extends('layouts.layout')

@section('title')
    Home
@endsection

@section('content')

    {{-- <div class="container-fluid p-0">
        <div class="row p-0 mr-0">
            <div class="col-md-12 mainCover m-0">
                <p class="text-light h1 text-center shadow-text text-uppercase align-middle font-weight-bold mb-3">
                    Shopping Website Demo
                </p>
                <p class="text-center text-light shadow-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo fuga dicta autem quia asperiores, temporibus officiis velit aliquam perspiciatis quas sequi 
                    <br>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-success border-0 mt-3 hvr-sweep-to-right">Start Shopping</a>
                    @endguest
                </p>
            </div>
        </div>
    </div> --}}

    <test-component></test-component>
    
    <div class="container-fluid mt-0 p-0">
        <div class="row m-0">
            <div class="col-md-12 secondaryCover mt-0">
                <p class="h1 shadow-text text-light text-center text-uppercase p-0">
                    Find out what U need! <br>
                    <a href="{{ url('search') }}" class="btn btn-dark hvr-sweep-to-right border-0">Explore <i class="fas fa-arrow-right"></i></a>
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-4 mb-3">
            @if(Session::has('success'))
            <div class="col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

            @if (Session::has('error'))
                <div class="col-md-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <div class="container">
        
        <h3 class="mt-5 mb-3 text-uppercase">Featured Products</h3>
        <div class="d-flex justify-content-center">
            {{ $products->links()}}
        </div>
        <div class="row mb-3">
            @foreach($products as $product)
                <div class="col-md-4 col-xs-12 mt-5">
                    <div class="card shadow">
                        
                        <a title=" {{ $product->name }} " href=" {{url('products', $product->id)}} ">
                            <img src="{{ $product->imagePath }}" class="card-img-top w-100 h-100">
                        </a>
                        
                        
                        <div class="card-body">
                            <h3>
                                <a title="more details" class="product_name card-title" href="{{ url('products', $product->id) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <hr>
                            <p>Price - <span class="badge badge-success">$ {{  $product->price }}</span></p>
                            <p>Quantity - <span class="badge badge-danger">{{ $product->quantity }}</span>
                            <p>
                                Category -
                                @foreach($product->categories as $category)
                                    {{ $category->name }}, 
                                @endforeach
                            </p>
                        </div>
                        
                        <div class="card-footer p-0 m-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <a href="{{ route('addToCart', ['id' => $product->id] ) }}" class="col-6 p-0 text-center p-3 noTextDecoration btn btn-info button-square">
                                        <div class="text-center">
                                            Add to Cart <i class="fas fa-shopping-cart pl-2"></i>
                                        </div>
                                    </a>
                                    <a href="{{ url('wishlist', $product->id) }}" class="col-6 text-center p-3  pr-0 noTextDecoration btn btn-success button-square">
                                        <div class="text-center">
                                            Wishlist 
                                            @if (isset($list)) 
                                                @if ( in_array($product->id, $list) )
                                                <i title="Wish List" class="fas fa-heart pl-2 text-danger"></i>
                                                @else
                                                <i title="Wish List" class="fas fa-heart pl-2 text-light"></i>
                                                @endif
                                            @else
                                                <i title="Wish List" class="fas fa-heart pl-2 text-light"></i>
                                            @endif
                                            
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        
    </div>  
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-5 mt-5">Categories</h3>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3">
                            <div class="card shadow mb-5">
                                <div class="">
                                    <a title=" {{$category->name}} " href=" {{url('searchByCategory', $category->id)}} ">
                                        <img src="https://via.placeholder.com/150" class="card-img-top">
                                    </a>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-link text-dark pl-0" href=" {{url('searchByCategory', $category->id)}} "><h5>{{$category->name}}</h5></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row mt-5 m-0">
            <div class="col-md-6 mb-5">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit tempora quibusdam similique perferendis provident ea aut non omnis eaque consectetur, adipisci facilis, hic ab error optio consequuntur illo ipsa excepturi.</p>
            </div>
            <div class="col-md-6 mb-5">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit tempora quibusdam similique perferendis provident ea aut non omnis eaque consectetur, adipisci facilis, hic ab error optio consequuntur illo ipsa excepturi.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3 mb-5">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, possimus odio, error aliquid suscipit quae nesciunt animi consequatur, reiciendis ducimus quod expedita iusto? Quas, temporibus. Quaerat quo aliquam doloribus corporis Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta maxime beatae blanditiis sit molestias ex nam porro, ut, facilis adipisci dolor alias tempore magni omnis labore non ab iusto? Natus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id eos iste consectetur minima perspiciatis sequi nam modi quos quia itaque! Saepe eveniet tempora magnam! Minus necessitatibus alias expedita dicta obcaecati. 
                </p>
            </div>
        </div>
    </div>

@endsection
