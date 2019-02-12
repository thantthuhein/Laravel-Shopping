@extends('layouts.profile')

@section('title')
    <title>Profile</title>
@endsection 

@section('content')
    <h1>user profile</h1>
    <p>
        reset pw, edit name, change ph, email-address etc...(ProfileController)
    </p>
    <a class="btn btn-primary" href=" {{url('/')}} "><i class="fas fa-home"></i></a>
@endsection 