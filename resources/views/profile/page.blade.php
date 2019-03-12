@extends('layouts.layout')

@section('title')
    Profile
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 text-center">
            @if (Session::has('success'))
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }} 
                    <a href="" class="btn btn-sm">x</a>
                </div>
            @endif
            <img class="rounded-circle" src="https://via.placeholder.com/150" alt="">
            <br> 
            <p class="mt-3 mb-4">
                {{ $user->name }} 
                @if (auth()->user()->is_Admin == TRUE)
                    <i class="fas fa-user-secret"></i>
                @else
                    <i class="fas fa-user"></i>
                @endif
                <span class="text-muted">
                    @if (auth()->user()->is_Admin == TRUE)
                        . Administrator
                    @else
                        
                    @endif
                </span>
                <br>
                Member Since: {{ $user->created_at->format('d. D. M. Y') }}
        </div>
    </div>
    <div class="container border_radius_40 shadow p-5 mb-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-6">
                <p>
                    User Name: <span class="text-uppercase">{{ $user->name }}</span>
                </p>
            </div>
            <div class="col-md-6">
                Email Address: {{ $user->email }} 
            </div>
        </div>
        <hr>
        <div class="row justify-content-center m-0">
            <div class="col-md-6">
                <p>
                    Phone Number:
                    @if ($user->phone == NULL)
                        <span class="text-uppercase text-muted">None</span> 
                    @else
                        <span>{{ $user->phone }}</span>
                    @endif 
                </p>
            </div>
            <div class="col-md-6">
                Address: 
                @if ($user->address == NULL)
                    <span class="text-uppercase text-muted">None</span> 
                @else    
                    {{ $user->address }} 
                @endif
            </div>
        </div>
        <hr>
        <div class="row pl-3">
            <div class="col-md-6">
                <div>
                    <a class="" href="{{ url('getChangeInfo') }}">Edit Info<i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/getCreditDetails') }}">Credits Points & Orders</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12 text-left">
                @if (auth()->user()->is_Admin == TRUE)
                    <a class="btn btn-danger" href="{{ url('/dashboard') }}">Go To Dashboard <i class="fas fa-chart-line"></i></a>
                @else
                    <a class="btn btn-dark" href="{{ url('/getFeedback') }}">Send Feedback <i class="fas fa-comment-alt"></i> </a>
                @endif
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    <script>
    </script>
@endsection