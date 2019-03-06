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
                    <a href="{{ url('/dashboard/generateCards_i', 10) }}" class="btn btn-dark"> x 10 </a>
                    <a href="{{ url('/dashboard/generateCards_i', 100) }}" class="btn btn-dark"> x 100 </a>
                    <a href="{{ url('/dashboard/generateCards_i', 300) }}" class="btn btn-dark"> x 300 </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-info bg-info p-5">
                <h5 class="text-center mb-4">Generate $3000 Credit Card</h5>
                <div class="text-center">
                    <a href="{{ url('/dashboard/generateCards_ii', 10) }}" class="btn btn-dark"> x 10 </a>
                    <a href="{{ url('/dashboard/generateCards_ii', 100) }}" class="btn btn-dark"> x 100 </a>
                    <a href="{{ url('/dashboard/generateCards_ii', 300) }}" class="btn btn-dark"> x 300 </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-info bg-info p-5">
                <h5 class="text-center mb-4">Generate $5000 Credit Card</h5>
                <div class="text-center">
                    <a href="{{ url('/dashboard/generateCards_iii', 10) }}" class="btn btn-dark"> x 10 </a>
                    <a href="{{ url('/dashboard/generateCards_iii', 100) }}" class="btn btn-dark"> x 100 </a>
                    <a href="{{ url('/dashboard/generateCards_iii', 300) }}" class="btn btn-dark"> x 300 </a>
                </div>
            </div>
        </div>

    </div>
@endsection