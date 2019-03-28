@extends('layouts.dashboard')
@section('title')
    Users and Roles   
@endsection
@section('content')

    <div class="row mt-4 ml-1 mr-2">
        <div class="col-8">
            <h3>Users</h3>
            <table class="table table-bordered table-hover mt-4 shadow">
                <thead class="top-bar text-light">
                    <tr>
                        <th>Name</th>                        
                        <th>Actions</th>
                    </tr>
                </thead>
                @if (Session::has('blocked'))
                    <p class="alert alert-danger">Successfully blocked!</p>
                @endif
                @if (Session::has('unblocked'))
                    <p class="alert alert-success">Successfully Unblocked!</p>
                @endif

                @foreach ($users as $user)
                    @if($user->is_Admin == false)
                    <tr>
                        <th>
                            <a href="{{ url('/dashboard/userDetails', $user->id) }}" class="text-uppercase d-inline noTextDecoration">{{ $user->name }}</a>
                            <span class="badge badge-secondary">User</span>
                        </th>
                        <th>
                            <a class="btn btn-warning btn-sm hvr-grow mr-3 " href=" {{ url('user/promote', $user->id) }} " data-toggle="tooltip" data-placement="top" title="promote to admin">Appoint as Admin</a>
                            @if ($user->banned_at == NULL)
                                <a class="btn btn-danger btn-sm hvr-grow" href=" {{ url('user/ban', $user->id) }} " data-toggle="tooltip" data-placement="top" title="block user"><i class="fas fa-user-slash"></i></a>
                            @endif
                            @if($user->banned_at == !NULL)    
                                <a class="btn btn-success btn-sm hvr-grow" href=" {{ url('user/unban', $user->id) }} " data-toggle="tooltip" data-placement="top" title="unblock user">Unblock
                            </a>
                            @endif
                        </th>
                    </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="col-md-4">
            <h3>Admins</h3>
            <table class="table table-bordered table-hover mt-4 shadow">
                <thead class="top-bar text-light">
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user)
                        @if ($user->is_Admin == true)
                            <tr>
                                <th> <a class="noTextDecoration" href="{{ url('/dashboard/userDetails', $user->id) }}">{{ $user->name }}</a><span class="badge badge-primary">Admin</span></th>
                                <th>
                                    <a class="btn btn-danger btn-sm hvr-grow" href=" {{ url('user/remove', $user->id) }} " data-toggle="tooltip" data-placement="top" title="remove from admin">Remove</a>
                                </th>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection