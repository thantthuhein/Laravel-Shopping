@extends('layouts.layout')

@section('title')
    Enter Pin to Buy Card
@endsection 

@section('content')
    <div class="row justify-content-center m-0 mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Credits Top Up</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @elseif (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    {{ Form::open(['method' => 'POST', 'url' => 'topUpCredits']) }}
                        <div class="form-group">
                            <label for="pin">Enter Pin</label>
                            {{ Form::text('pin', NULL, ['class' => ($errors->has('pin') ? 'form-control is-invalid' : 'form-control')]) }}
                            @if($errors->has('pin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('pin')}} </strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success text-center">Submit Pin</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection 