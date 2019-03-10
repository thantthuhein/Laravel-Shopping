@extends('layouts.dashboard')

@section('title')
    Used Cards 
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="clearfix">
                <h4 class="text-uppercase float-left">
                    Used Credit Cards: {{ count($usedCards) }}
                </h4>
                <a class="btn btn-danger float-right" href="{{ url('/dashboard/deleteAllUsedCardsHistory') }}">Delete All History</a>
            </div>
        </div>
    </div>
    @if (0 == count($usedCards))
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-5">Nothings !</h1>
            </div>
        </div>
    @else

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card shadow">
                    <table class="table table-hover">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>Pin</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usedCards as $card)  
                                <tr>
                                    <th>{{ $card->pin }}</th>
                                    <th>$ {{ $card->value }}</th>
                                    <th>
                                        @if ( $card->useable == TRUE )
                                            <p class="text-success">Useable</p>
                                        @else
                                            <p class="text-danger">Used</p>
                                        @endif  
                                    </th>
                                    <th>
                                        <a class="btn btn-dark" href="{{ url('/dashboard/usedCardDetails', $card->id) }}"><i class="fas fa-info-circle"></i></a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endif
@endsection