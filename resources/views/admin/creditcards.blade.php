@extends('layouts.dashboard')

@section('title')
    Credit Cards Details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center text-uppercase">Credit Cards Details</h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <a class="noTextDecoration" href="{{ url('/dashboard/getTotalCards') }}">
                <div class="shadow details">
                    <div class="text-center bg-info card p-3 text-dark">
                        <p>Total Cards</p>
                        <h1>
                            {{ count($totalCards) }}
                        </h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="noTextDecoration" href="{{ url('/dashboard/getUseableCards') }}">
                <div class="shadow details">
                    <div class="text-center bg-info card p-3 text-dark">
                        <p>Useable Cards</p>
                        <h1>
                            {{ count($useableCards) }}
                        </h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="noTextDecoration" href="{{ url('/dashboard/getUsedCards') }}">
                <div class="shadow details">
                    <div class="text-center bg-info card p-3 text-dark">
                        <p>Used Cards</p>
                        <h1>
                            {{ count($usedCards) }}
                        </h1>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <hr>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card border-info bg-info p-5">
                <h5 class="text-center mb-4">Generate $1000 Credit Card</h5>
                <div class="text-center">
                    <button class="btn btn-dark"> x 10</button>
                    <button class="btn btn-dark"> x 100</button>
                    <button class="btn btn-dark"> x 1000</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-info bg-info p-5">
                <h5 class="text-center mb-4">Generate $3000 Credit Card</h5>
                <div class="text-center">
                    <button class="btn btn-dark"> x 10</button>
                    <button class="btn btn-dark"> x 100</button>
                    <button class="btn btn-dark"> x 1000</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-info bg-info p-5">
                <h5 class="text-center mb-4">Generate $5000 Credit Card</h5>
                <div class="text-center">
                    <button class="btn btn-dark"> x 10</button>
                    <button class="btn btn-dark"> x 100</button>
                    <button class="btn btn-dark"> x 1000</button>
                </div>
            </div>
        </div>

    </div>
@endsection