@extends('layouts.dashboard')

@section('title')
    Used Cards In Database
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-uppercase text-center">
                Used Credit Cards: {{ count($usedCards) }}
            </h5>
        </div>
    </div>

    <div class="row mt-2 p-4">
        <table class="table table-hover shadow">
            <thead>
                <tr>
                    <th>Pin</th>
                    <th>Value</th>
                    <th>Status</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection