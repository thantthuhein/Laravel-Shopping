@extends('layouts.dashboard')

@section('title')
    Used Card Details
@endsection

@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="clearfix">
                <h4 class="float-left">Used Prepaid Card Details</h4>
                <a href="{{ url('/dashboard/deleteHistory', $card->id) }}" class="float-right btn btn-danger">Delete History</a>
            </div>
        </div>
        @if ( !$card )
            <div class="col-12">
                <h1 class="mt-5">Nothing !</h1>
            </div>
        @else
            <div class="col-md-12">
                <div >
                    <table class="table">
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Card Value</th>
                            <th>Purchased At</th>
                        </tr>
                        <tr>
                            <td><a class="noTextDecoration" href="{{ url('/dashboard/userDetails', $card->user->id) }}">{{ $card->user->name }}</a></td>
                            <td>{{ $card->user->email }}</td>
                            <td>{{ $card->user->phone }}</td>
                            <td>$ {{ $card->value }}</td>
                            <td>{{ $card->purchased_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection