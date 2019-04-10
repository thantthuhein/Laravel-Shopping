<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css"> --}}
  @yield('links')
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
  <div id="wrapper" class="toggled">
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="#">
            MENU
          </a>
        </li>
        <li class='pt-3'>
          <a href="{{ url('/dashboard') }}"><i class="fas fa-chart-line"></i> DASHBOARD</a>
        </li>
        <li class='pt-3'>
          <a href=" {{url('/dashboard/products')}} "><i class="fas fa-box-open"></i> PRODUCTS</a>
        </li>
        <li class='pt-3'>
          <a href=" {{url('/dashboard/categories')}} "><i class="fas fa-book-open"></i> CATEGORIES</a>
        </li>
        <li class='pt-3'>
          <a href=" {{url('/dashboard/users')}} "><i class="fas fa-users ml-0"></i> USERS</a>
        </li>
        <li class='pt-3'>
          <a href="{{ url('/dashboard/orders') }}"><i class="fas fa-shopping-cart"></i> ORDERS</a>
        </li>
        {{-- <li class='pt-3'>
          <a href="#"> MONTHLY REPORTS?TO DO</a>
        </li> --}}
        <li class='pt-3'>
          <a href="{{ url('/dashboard/getCreditcardsDetails') }}"><i class="fas fa-credit-card"></i> PREPAID CARDS</a>
        </li>
        <li class='pt-3'>
          <a href="{{ url('/dashboard/showUserFeedbacks') }}"><i class="fas fa-comments"></i> USER FEEDBACKS</a>
        </li>
      </ul>

    </div>

    <div id="page-content-wrapper pt-0">
      <div class="dash-bar">
        <nav class="navbar navbar-expand navbar-light p-0 ml-5">
          <a class="navbar-brand text-light p-2" href="#menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
          </a>
          <a class="navbar-brand text-light p-2" href=" {{url('/')}} " id="menu-toggle">
            <i class="fas fa-home"></i>
          </a>
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active d-none d-sm-block">
                <a class="nav-link h3 text-light" href=" {{url('dashboard')}} ">DASHBOARD</a>
              </li>  
            </ul>
            <ul class="navbar-nav navbar-right d-none d-sm-block"> 
                @guest
                <li class="nav-item mt-1">
                    <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item mt-1">
                    @if (Route::has('register'))
                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
                  @else
                <li class="nav-item mt-1 dropdown">
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
          </div>
        </nav>
      </div>
    </div>
    <div class="container-fluid mt-3">
      @yield('content')
    </div>
  </div>

  

  {{-- bootstrap cdn  --}} {{-- jquery cdn --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    // for side nav toggle
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    // for tooltips
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    // for items searching
    $('.alert').alert()
  </script>
  @yield('scripts')

</body>
</html>