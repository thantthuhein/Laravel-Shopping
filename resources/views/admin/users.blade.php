@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Users</h3>
        </div>
        <div class="col-md-6">

        </div>
    </div>

    <div class="row mt-4">
        <div class="col-10">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <th>
                            {{$user->name}} 
                            @if ( $user->isAdmin == 1 ) 
                                <span class="badge badge-primary">Admin</span> 
                            @else  
                                <span class="badge badge-secondary">User</span>
                            @endif 
                        </th>
                        <th>{{$user->email}}</th>
                        <th>
                            @if ($user->isAdmin == 1)
                                <span></span>
                            @else
                                <a class="btn btn-secondary hvr-grow" href=" {{ url('user/promote', $user->id) }} " data-toggle="tooltip" data-placement="top" title="promote">Appoint as Admin</a>
                            @endif
                            <a class="btn btn-danger hvr-grow" href=" {{ url('user/destroy', $user->id) }} " data-toggle="tooltip" data-placement="top" title="remove">Remove</a>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection