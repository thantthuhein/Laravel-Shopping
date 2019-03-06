@extends('layouts.dashboard')

@section('title')
    Useable Cards In Database
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <h5 class="text-uppercase text-center">
                Useable Credit Cards: {{ count($useableCards) }}
            </h5>
        </div>
    </div>

    <div class="row mt-2 p-4">
        <table class="table table-hover shadow">
            <thead>
                <tr>
                    <th>Pin</th>
                    <th>Value</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($useableCards as $card)  
                    <tr>
                        <th>{{ $card->pin }}</th>
                        <th>$ {{ $card->value }}</th>
                        <th>{{ $card->created_at->format('d:M:Y | h:i:a') }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection