    <nav class="navbar navbar-expand-lg navbar-light p-2 m-0 top-bar">
        <a class="navbar-brand text-light p-0" href="{{ url('/') }}"><h3 class="m-0">BRAND</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="justify-content-start">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{ url('/getProfile') }}">
                            <i class="fas fa-user"></i> PROFILE
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{ route('shoppingCart') }}">
                            <i class="fas fa-shopping-cart"></i> SHOPPING CART 
                            <span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{url('wishlist')}}">
                            <i class="fas fa-heart"></i> WISH LIST <span class="badge badge-success">{{ Session::has('wishlist') ? collect(Session::get('wishlist'))->count() : '' }}</span></a></li>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="#"></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="#"></a>
                    </li>
                </ul>
            </div>

            {{-- nav right --}}
            <ul class="navbar-nav ml-auto"> 
                @guest
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link text-light" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    @endif
                </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
      </nav>


