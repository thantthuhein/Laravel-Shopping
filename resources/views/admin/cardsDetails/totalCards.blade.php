@extends('layouts.dashboard')

@section('title')
    Total Prepaid Cards
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-uppercase text-center">
                Total Prepaid Cards: {{ count($totalCards) }}
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
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $card)  
                    <tr>
                        <td>{{ $card->pin }}</td>
                        <td>$ {{ $card->value }}</td>
                        <td>{{ $card->created_at->format('d/M/Y, h:i:a') }}</td>
                        <td>
                            @if ( $card->useable == TRUE )
                                <p class="text-success">Useable</p>
                            @else
                                <p class="text-danger">Used</p>
                            @endif  
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $cards->links() }}
        </div>
    </div>
@endsection