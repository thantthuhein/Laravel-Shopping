@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ( auth()->user()->isAdmin == 1) 
                        Admin Profile
                        <a class="btn btn-primary" href=" {{url('dashboard')}} ">Admin Dashboard</a>
                    @else
                        User Profile
                        <a class="btn btn-primary" href=" {{url('/')}} ">Back to Home</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
