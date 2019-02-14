@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row mt-4 mb-3">
        <div class="col-md-4">
            <form class="form-inline d-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <i title="Search List" class="fas fa-search"></i></button>
            </form>
        </div>
        @if(Session::has('success'))
            <div class="col-md-8">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }} 
                    <a href="" class="btn btn-sm">x</a>
                </div>
            </div>
        @endif
    </div>
    <div id="carouselExampleControls" class="carousel slide mt-3" data-ride="carousel">
        <h3>Latest Items</h3>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="https://via.placeholder.com/350x65" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/350x65" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/350x65" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
</div>



<div class="container">
    <h3 class="mt-5 mb-3">Featured Products</h3>
    <div class="row mb-3">
        @foreach($products as $product)
            <div class="col-4 mt-5">
                <div class="card shadow">
                    <div class="p-3">
                        <a title=" {{$product->name}} " href=" {{url('products', $product->id)}} ">
                            <img src="https://via.placeholder.com/150" class="card-img-top">
                        </a>
                    </div>
                    
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
                                <a href="{{ route('addToCart', ['id' => $product->id] ) }}" class="col p-0 text-center p-3 noTextDecoration onHover">
                                    <div class="text-center text-dark">
                                        Add to Cart <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </a>
                                <a href="{{ url('wishlist', $product->id) }}" class="col p-0 text-center p-3 noTextDecoration onHover">
                                    <div class="text-center text-dark">
                                        Wishlist 
                                        @if( session('wishlist') == null )
                                            <i title="Wish List" class="fas fa-heart text-dark"></i>
                                        @elseif(session('wishlist'))
                                            @if( array_key_exists($product->id, session('wishlist')))
                                                <i title="Wish List" class="fas fa-heart text-danger"></i>
                                            @else
                                                <i title="Wish List" class="fas fa-heart text-dark"></i>
                                            @endif
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
    <br>
    <div class="d-flex justify-content-center">
        {{ $products->links()}}
    </div>
    <hr>
    <h3 class="mb-5 mt-5">Categories</h3>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3">
                <div class="card shadow mb-5">
                    <div class="p-3">
                        <a title=" {{$category->name}} " href=" {{url('categories', $category->id)}} ">
                            <img src="https://via.placeholder.com/150" class="card-img-top">
                        </a>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-link text-dark" href=" {{url('categories', $category->id)}} "><h3>{{$category->name}}</h3></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>  
<div class="container mt-5 mb-5">
    <hr>
    <div class="row mt-5">
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

@include('layouts.footer')
@endsection