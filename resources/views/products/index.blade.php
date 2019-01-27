@extends('layout')

@section('content')
    <div class="container-fluid top-bar">
        <nav class="navbar navbar-expand">
            <a href="#" class="navbar-brand text-light"><h3>LOGO</h3></a>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href=" {{url('cart')}} " class="nav-link text-light">Shopping Cart</a></li>
                    <li class="nav-item"><a href=" {{url('wishlist')}} " class="nav-link text-light">Wish List</a></li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link text-light" href=" {{ url('/home') }} ">Profile</a>
                    </li>
               </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-search"></i></button>
                </form>     
            </div>  
        </nav>
    </div>
    <div class="container">
        <h3 class="mt-5 mb-3">Products in Store</h3>
        <div class="row mb-3">
            @foreach($products as $product)
                <div class="col-3 mt-5">
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
            
                        <div class="card-footer">
                            <div class="row">
                                <a href=" {{ url('cart', $product->id) }} " class="btn">
                                    <div class="col-6">
                                        <p title="Add to Cart" class="d-inline text-dark">Add to Cart</p> <i class="fas fa-shopping-cart"></i>     
                                    </div>
                                </a>
                                <a href=" {{url('wishlist', $product->id)}} " class="btn btn-link">
                                    <div class="col-6">
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
            @endforeach
        </div>
        <br>
        <div class="d-flex justify-content-center">
            {{ $products->links()}}
        </div>
        <hr>
    </div>
    @section('footer')
        <div class="footer">
            <p class="text-center text-light">Copy Right &copy;</p>
        </div>   
    @endsection
@endsection