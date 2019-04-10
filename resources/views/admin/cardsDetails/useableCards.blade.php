@extends('layouts.dashboard')

@section('title')
    Useable Cards In Database
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <h5 class="text-uppercase text-center">
                Useable Prepaid Cards: {{ count($useableCards) }}
            </h5>
        </div>
    </div>

    <div class="row mt-2 p-4">
        <table class="table table-hover">
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
                        <td>{{ $card->pin }}</td>
                        <td>$ {{ $card->value }}</td>
                        <td>{{ $card->created_at->format('d/M/Y, h:i:a') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $useableCards->links() }}
        </div>
    </div>
@endsection