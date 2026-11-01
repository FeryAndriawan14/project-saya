@extends('layout.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient-primary text-white text-center rounded-top">
                        <h3 class="mb-0">✨ Buat URL Pendek ✨</h3>
                        <p class="small mt-2">Mempermudah akses URL Anda dengan cepat dan elegan</p>
                    </div>
                    <div class="card-body p-4">
                        {{-- Notifikasi sukses --}}
                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-check me-2" style="color: green;"></i>
                                <div>
                                    🎉 {{ session('success') }}
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <h4 class="fw-bold text-primary">URL Pendek Anda:</h4>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <a href="{{ session('short_url') }}" target="_blank"
                                        class="btn btn-success btn-lg me-3 animate__animated animate__bounceIn">
                                        🌐 Kunjungi URL Pendek
                                    </a>
                                    <button id="copyButton" onclick="copyToClipboard('{{ session('short_url') }}')"
                                        class="btn btn-outline-secondary btn-lg">
                                        📋 Salin URL
                                    </button>
                                </div>
                                <h4 class="fw-bold text-primary mt-4">QR Code:</h4>
                                <div>{!! session('qr_code') !!}</div>
                                <p class="text-muted">Scan QR Code untuk akses langsung</p>
                            </div>
                        @endif

                        {{-- Notifikasi kesalahan --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>⚠️ {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Form input --}}
                        <form action="{{ route('urls.store') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="url" name="long_url" id="long_url" class="form-control border-primary"
                                    required placeholder="https://example.com">
                                <label for="long_url">🌐 URL Panjang</label>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold">Status</label>
                                <div class="form-check">
                                    <input type="radio" name="status" value="draft" class="form-check-input"
                                        id="status_draft" checked>
                                    <label for="status_draft" class="form-check-label">📝 Draft</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="online" class="form-check-input"
                                        id="status_online">
                                    <label for="status_online" class="form-check-label">🌐 Online</label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-primary btn-lg w-100 animate__animated animate__pulse">
                                    🚀 Publish
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            const tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = text;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            const copyButton = document.getElementById('copyButton');
            copyButton.textContent = '✅ URL Disalin!';
            setTimeout(() => {
                copyButton.textContent = '📋 Salin URL';
            }, 2000);
        }
    </script>

    <style>
        .bg-gradient-primary {
            background: linear-gradient(90deg, #4e73df, #1cc88a);
        }

        .btn-lg {
            font-size: 1.25rem;
        }

        .form-control {
            border-width: 2px;
        }

        .btn {
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
