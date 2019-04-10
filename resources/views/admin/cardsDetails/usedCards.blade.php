@extends('layouts.dashboard')

@section('title')
    Used Cards 
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="clearfix">
                <h4 class="text-uppercase float-left">
                    Used Prepaid Cards: {{ count($usedCards) }}
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
                <div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Pin</th>
                                <th>Value</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usedCards as $card)  
                                <tr>
                                    <td>{{ $card->pin }}</td>
                                    <td>$ {{ $card->value }}</td>
                                    <td>
                                        <a class="btn btn-outline-info" href="{{ url('/dashboard/usedCardDetails', $card->id) }}"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $usedCards->links() }}
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection