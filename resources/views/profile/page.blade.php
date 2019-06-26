@extends('layouts.layout')

@section('title')
    Profile
@endsection 

@section('content')
    <div class="container">
        <div class="row m-0">
            <div class="col-md-12 mt-4 text-center">
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
        <div class="row">
            <div class="col-md-8">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }} 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>User Name</td>
                            <td>Email Address</td>
                            <td>Phone Number</td>
                            <td>Address</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span>{{ $user->name }}</span></td>
                            <td><span>{{ $user->email }}</span></td>
                            <td>
                                @if ($user->phone == NULL)
                                    <span class="text-uppercase text-muted">None</span> 
                                @else
                                    <span>{{ $user->phone }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->address == NULL)
                                    <span class="text-uppercase text-muted">None</span> 
                                @else    
                                    {{ $user->address }} 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-outline-info" href="{{ url('getChangeInfo') }}">Edit Info <i class="fas fa-edit"></i></a>
                                <a class="btn btn-outline-info" href="{{ url('/getCreditDetails') }}">Credits Points & Orders</a>
                                @if (auth()->user()->is_Admin == TRUE)
                                    <a class="btn btn-outline-danger" href="{{ url('/dashboard') }}">Go To Dashboard <i class="fas fa-chart-line"></i></a>
                                @else
                                    <a class="btn btn-outline-dark" href="{{ url('/getFeedback') }}">Send Feedback <i class="fas fa-comment-alt"></i> </a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    <script>
    </script>
@endsection