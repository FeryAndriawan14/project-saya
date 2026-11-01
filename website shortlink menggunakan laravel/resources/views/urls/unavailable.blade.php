@extends('layout.main')

@section('content')
    <div class="container py-5 text-center">
        <div class="card mx-auto" style="max-width: 600px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <!-- Ikon Peringatan -->
                <i class="fas fa-exclamation-circle fa-5x text-warning"></i>
                <h1 class="text-warning mt-3">URL Tidak Tersedia</h1>
                <p class="text-muted">{{ $message }}</p>

                <!-- Tombol Kembali ke Dashboard dengan ikon home -->
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg mt-4">
                    <i class="fas fa-home-alt"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
