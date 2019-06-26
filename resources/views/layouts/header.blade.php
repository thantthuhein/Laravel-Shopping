    <nav class="navbar navbar-expand-lg navbar-light p-1 m-0 bar navigation">
        <div class="container">

            <a class="navbar-brand text-light p-0" href="{{ url('/') }}">LOGO</a>
            <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- nav right --}}
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{url('wishlist')}}">  
                        <i class="fas fa-heart"></i> Wishlist <span class="badge badge-success badge-pill"></span></a></li>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="{{ route('shoppingCart') }}">
                            <i class="fas fa-shopping-cart"></i> Shopping Cart 
                            <span class="badge badge-warning badge-pill">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                        </a>
                    </li>
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
                            @if (auth()->user()->is_Admin == TRUE)
                            <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                Admin Dashboard 
                            </a>
                            @else
                                <a class="dropdown-item" href="{{ url('/getFeedback') }}">
                                    Send Feedback 
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ url('/getProfile') }}">
                                Manage Account
                            </a>
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
        </div>
    </nav>


