@extends('layouts.layout')

@section('content')
    <div class="row m-0 justify-content-center">
        <div class="col-6 p-5">
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-center">Change Info</p>
                </div>
                <div class="card-body">
                    {{ Form::model($user, ['route' => 'changeInfo', 'method' => 'POST']) }}
                        <div class="form-group">
                            <label for="address">name</label>
                            {{ Form::text('name', NULL, ['class' => ($errors->has('name') ? 'form-control is-invalid' : 'form-control'), 'id' => 'name', 'placeholder' => 'For Example: House #123, Street #123, #A Road'])}}
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('name')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">phone</label>
                            {{ Form::number('phone', NULL, ['class' => ($errors->has('phone') ? 'form-control is-invalid' : 'form-control'), 'id' => 'phone', 'placeholder' => '09'])}}
                            @if($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('phone')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            {{ Form::text('address', NULL, ['class' => ($errors->has('address') ? 'form-control is-invalid' : 'form-control'), 'id' => 'address', 'placeholder' => 'For Example: House #123, Street #123, #A Road'])}}
                            @if($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('address')}} </strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection