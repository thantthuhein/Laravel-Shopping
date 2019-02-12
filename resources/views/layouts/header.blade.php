<div class="container-fluid top-bar">
    <nav class="navbar navbar-expand">
        <a href="{{ url('/') }}" class="navbar-brand text-light"><h3>LOGO</h3></a>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('shoppingCart') }}" class="nav-link text-light">
                        <i class="fas fa-shopping-cart"></i> Shopping Cart 
                        <span class="badge badge-success">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>
                <li class="nav-item"><a href=" {{url('wishlist')}} " class="nav-link text-light"><i class="fas fa-bookmark"></i> Wish List</a></li>
                <li class="nav-item">
                    <a class="nav-link text-light" href=" {{ url('/home') }}"><i class="fas fa-user-circle"></i></a>
                </li>
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
           </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-search"></i></button>
            </form>     
        </div>  
    </nav>
</div>