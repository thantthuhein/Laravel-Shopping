@extends('layouts.layout')

@section('title')
    Orders
@endsection

@section('content')
    <div class="row mt-4 p-5">
        <div class="col-md-6">
            <h3>Orders List</h3>
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">
                    <h5 class="card-title">Pick Date</h5>
                </div>
                <div class="card-body">
                    {{ Form::open([]) }}
                        <input class="btn btn-dark" type="date" name="date">
                        <button class="btn btn-success" type="submit">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-0 pt-0 p-5">
        <div class="col-md-12">
            ORDERS
        </div>
    </div>
@endsection