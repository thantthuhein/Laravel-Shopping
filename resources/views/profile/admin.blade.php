@extends('layouts.profile')

@section('title')
    <title>Profile</title>
@endsection 

@section('content')
    <h1>admin profile</h1>
    <a class="btn btn-primary" href=" {{url('dashboard')}} ">Admin Dashboard</a>
@endsection 