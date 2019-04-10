@extends('layouts.dashboard')

@section('title')
    Users and Roles   
@endsection

@section('content')

    <div class="row mt-4 ml-1 mr-2">

        <div class="col-8">

            <h3>Users</h3>

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <td>Name</td>                        
                        <td>Actions</td>
                    </tr>
                </thead>
                @if (Session::has('blocked'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Successfully blocked!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('unblocked'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Successfully Unblocked!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @foreach ($users as $user)
                    @if($user->is_Admin == false)
                    <tr>
                        <td>
                            <a href="{{ url('/dashboard/userDetails', $user->id) }}" class="text-uppercase d-inline noTextDecoration">{{ $user->name }}</a>
                            <span class="badge badge-secondary">User</span>
                        </td>
                        <td>
                            <a class="btn btn-outline-warning mr-3 " href=" {{ url('user/promote', $user->id) }} " data-toggle="tooltip" data-placement="top" title="promote to admin">Appoint as Admin</a>
                            @if ($user->banned_at == NULL)
                                <a class="btn btn-outline-danger" href=" {{ url('user/ban', $user->id) }} " data-toggle="tooltip" data-placement="top" title="block user"><i class="fas fa-user-slash"></i></a>
                            @endif
                            @if($user->banned_at == !NULL)    
                                <a class="btn btn-outline-success" href=" {{ url('user/unban', $user->id) }} " data-toggle="tooltip" data-placement="top" title="unblock user">Unblock
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
            </table>
            
        </div>

        <div class="col-md-4">

            <h3>Admins</h3>

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user)
                        @if ($user->is_Admin == true)
                            <tr>
                                <td> <a class="noTextDecoration" href="{{ url('/dashboard/userDetails', $user->id) }}">{{ $user->name }}</a><span class="badge badge-primary">Admin</span></td>
                                <td>
                                    <a class="btn btn-outline-danger" href=" {{ url('user/remove', $user->id) }} " data-toggle="tooltip" data-placement="top" title="remove from admin">Remove</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection