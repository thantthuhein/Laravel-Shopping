@extends('layouts.dashboard')

@section('title')
    Used Card Details
@endsection

@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="clearfix">
                <h4 class="float-left">Used Credit Card Details</h4>
                <a href="{{ url('/dashboard/deleteHistory', $card->id) }}" class="float-right btn btn-danger">Delete History</a>
            </div>
        </div>
        @if ( !$card )
            <div class="col-12">
                <h1 class="mt-5">Nothing !</h1>
            </div>
        @else
            <div class="col-md-12">
                <div class="card shadow">
                    <table class="table">
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Credit Card Value</th>
                            <th>Purchased At</th>
                        </tr>
                        <tr>
                            <th><a class="noTextDecoration" href="{{ url('/dashboard/userDetails', $card->user->id) }}">{{ $card->user->name }}</a></th>
                            <th>{{ $card->user->email }}</th>
                            <th>0 {{ $card->user->phone }}</th>
                            <th>$ {{ $card->value }}</th>
                            <th>{{ $card->purchased_at }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection