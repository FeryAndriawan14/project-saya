<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #568cc5;
            /* Warna latar belakang biru */
            background-image: url('{{ asset('assets/images/loket.jpg') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        .card {
            background-color: rgba(232, 224, 224, 0.8);
            /* Tambahkan transparansi agar latar belakang tetap terlihat */
        }

        .card-img-top {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 1rem;
            /* Tambahkan jarak antara gambar dan form */
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.5rem 0;
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <!-- Tambahkan gambar di atas form -->
            <img src="{{ asset('assets/images/kementerian.jpg') }}" alt="Logo" class="card-img-top">
            <h2 class="card-title text-center mb-4">Login</h2>
            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2024 Pusat Data dan Informasi Pertanahan, Tata Ruang dan Lahan Pertanian Pangan Berkelanjutan Kementerian
        ATR/BPN
    </div>

    <!-- Script JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
