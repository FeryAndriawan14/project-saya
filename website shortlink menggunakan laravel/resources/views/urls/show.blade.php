@extends('layout.main')

@section('content')
    <div class="container py-5">
        <div class="text-center">
            <h3>Detail URL Pendek</h3>
            <p><strong>URL Panjang:</strong> {{ $url->long_url }}</p>
            <p><strong>URL Pendek:</strong> <a href="{{ $url->short_url }}" target="_blank">{{ $url->short_url }}</a></p>
            <p><strong>Status:</strong> {{ $url->status }}</p>
        </div>
    </div>
@endsection
