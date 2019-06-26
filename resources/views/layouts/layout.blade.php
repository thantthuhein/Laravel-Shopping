<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    @yield('links')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    {{-- header --}}
    <div class="container-fluid p-0 mt-0" id="app">
        @include('layouts.header')
        @yield('content')
    </div>

    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>
        // for side nav toggle
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
        // for tooltips
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        });
        $('.alert').alert();
    
    </script>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    
    
    @yield('scripts')
    
</body>
</html>