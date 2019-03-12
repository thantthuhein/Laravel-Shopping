@extends('layouts.layout')

@section('title')
    Send Feedback
@endsection 

@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Feedback</h5>
                </div>
                <div class="card-body">
                    {{ Form::open(['url' => '/sendFeedback', 'method' => 'POST']) }}
                        <input type="hidden" name="user_name" value="{{ auth()->user()->name }}">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            {{ Form::text('subject', null, [
                                'class' => ($errors->has('subject') ? 'form-control is-invalid' : 'form-control'), 
                                'placeholder' => 'Subject: #Example'
                                ])}}
                            @if($errors->has('subject'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('subject')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description <i class="fas fa-pencil"></i></label>
                            {{ Form::textarea('description', null, [
                                'class' => ($errors->has('description') ? 'form-control is-invalid' : 'form-control'), 
                                'placeholder' => 'Write Your Feedback here ...'
                                ])}}
                            @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('description')}} </strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-success">Send <i class="fas fa-paper-plane"></i></button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection