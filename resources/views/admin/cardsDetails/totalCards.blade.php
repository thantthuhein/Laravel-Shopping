@extends('layouts.dashboard')

@section('title')
    Total Credit Cards
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-uppercase text-center">
                Total Credit Cards: {{ count($cards) }}
            </h5>
        </div>
    </div>

    <div class="row mt-2 p-4">
        <table class="table table-hover shadow">
            <thead class="top-bar text-light">
                <tr>
                    <th>Pin</th>
                    <th>Value</th>
                    <th>Created At</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $card)  
                    <tr>
                        <th>{{ $card->pin }}</th>
                        <th>$ {{ $card->value }}</th>
                        <th>{{ $card->created_at->format('d:M:Y | h:i:a') }}</th>
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