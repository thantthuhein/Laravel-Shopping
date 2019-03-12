@extends('layouts.dashboard')

@section('title')
    Feedbacks
@endsection

@section('content')
    @if ($feedbacks->isEmpty() || !$feedbacks || $feedbacks == NULL)

    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <h1 class="mt-5 text-center">No Feedbacks Yet ! <i class="fas fa-frown"></i></h1>
        </div>
    </div>
        
    @else
    
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="clearfix">
                <h3 class="float-left">User Feedbacks</h3>
                <a class="float-right link noTextDecoration text-info" href="{{ url('/dashboard/markAsAllRead') }}">Mark as all Read <i class="fas fa-check-square"></i></a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            @foreach ($feedbacks as $feedback)
                @if ($feedback->read == FALSE)
                <div class="card shadow">
                    <div class="card-header">
                        <div class="clearfix">
                            <h5 class="float-left"><b>Subject: {{ $feedback->subject }}</b></h5>
                            <h5 class="float-right"><b>Customer Name: {{ $feedback->user_name }}</b></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                            <b><h5>Description:</h5> <br>{{ $feedback->description }}</b>
                        </p>
                        <div class="clearfix">
                            <a href="{{ url('/dashboard/markAsRead', $feedback->id) }}" class="float-left btn btn-outline-custom border-success text-success">Mark As Read <i class="fas fa-check-square"></i></a>
                            <a href="{{ url('/dashboard/deleteFeedback', $feedback->id) }}" class="float-right btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                <br>
                @else 
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="clearfix">
                                <h5 class="float-left">Subject: {{ $feedback->subject }}</h5>
                                <h5 class="float-right">Customer Name: {{ $feedback->user_name }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <h5>Description:</h5> <br>{{ $feedback->description }}
                            </p>
                            <div class="clearfix">
                                <a href="{{ url('/dashboard/deleteFeedback', $feedback->id) }}" class="float-right btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <br>
                @endif
            @endforeach 
        </div>
    </div>

    @endif
@endsection