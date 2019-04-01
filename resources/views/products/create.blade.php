@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <h3>Create New Product</h3>
    <hr>
    {{ Form::open(['route' => 'products.store', 'method' => "POST"]) }}
        <div class="row">
            <div class="col-md-6">
                @include('products.form')

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Processor</label>
                    {{ Form::text('processor', null, [
                            'class' => ($errors->has('processor') ? 'form-control is-invalid' : 'form-control')
                    ])}}
                    @if($errors->has('processor'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('processor')}} </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Ghz</label>
                    {{ Form::text('ghz', null, [
                            'class' => ($errors->has('ghz') ? 'form-control is-invalid' : 'form-control')
                    ])}}
                    @if($errors->has('ghz'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('ghz')}} </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Graphics</label>
                    {{ Form::text('graphics', null, [
                            'class' => ($errors->has('graphics') ? 'form-control is-invalid' : 'form-control')
                    ])}}
                    @if($errors->has('graphics'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('graphics')}} </strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label>memory</label>
                    {{ Form::text('memory', null, [
                            'class' => ($errors->has('memory') ? 'form-control is-invalid' : 'form-control')
                    ])}}
                    @if($errors->has('memory'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('memory')}} </strong>
                        </span>
                    @endif
                </div>
                    
                <div class="form-group">
                    <label>storage</label>
                    {{ Form::text('storage', null, [
                            'class' => ($errors->has('storage') ? 'form-control is-invalid' : 'form-control')
                    ])}}
                    @if($errors->has('storage'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('storage')}} </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>display</label>
                    {{ Form::text('display', null, [
                            'class' => ($errors->has('display') ? 'form-control is-invalid' : 'form-control')
                    ])}}
                    @if($errors->has('display'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('display')}} </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>ports</label>
                    {{ Form::text('ports', null, [
                            'class' => ($errors->has('ports') ? 'form-control is-invalid' : 'form-control')
                    ])}}
                    @if($errors->has('ports'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('ports')}} </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Category</label>
                    {{ Form::select('category_id[]', $categories, null,  [
                        'class' => "form-control",
                        'multiple' => 'multiple'
                    ]) }}
                </div>

                <button class="btn btn-primary">Create New Product</button>

            </div>
        </div>
    {{ Form::close() }}
    </div>
@endsection