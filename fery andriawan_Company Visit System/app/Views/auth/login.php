<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');

        body {
            background: #0f172a; /* Dark base for premium feel */
            background-image: radial-gradient(at 0% 0%, #1e293b 0px, transparent 50%),
                              radial-gradient(at 100% 100%, #0f172a 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .header-section { margin-bottom: 2.5rem; }
        .header-section h3 { 
            font-weight: 800; 
            color: #ffffff; 
            letter-spacing: -0.5px;
            margin-bottom: 0.5rem; 
        }
        .header-section p { color: #94a3b8; font-size: 0.9rem; }

        .form-label { color: #cbd5e1; font-size: 0.85rem; font-weight: 500; margin-bottom: 0.5rem; }
        
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 14px;
            color: white;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #38ef7d;
            box-shadow: 0 0 0 4px rgba(56, 239, 125, 0.15);
            color: white;
        }

        .btn-primary {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(56, 239, 125, 0.3);
            filter: brightness(1.1);
        }

       .footer-text {
            margin-top: 2.5rem;
            font-size: 0.7rem;
            color: #ffffff; /* Ubah ke warna putih */
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1); /* Sedikit disesuaikan agar tetap terlihat di atas background gelap */
            padding-top: 1.5rem;
            letter-spacing: 0.5px;
            opacity: 0.8; /* Opsional: sedikit transparan agar terlihat lebih elegan/premium */
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="header-section text-center">
            <h3>Welcome Back</h3>
            <p>Access your company visit system</p>
        </div>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger bg-danger bg-opacity-10 border-0 text-danger rounded-3 mb-4">
                <i class="fas fa-circle-exclamation me-2"></i><?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </form>

        <div class="footer-text">
            <p>Copyright © 2024. Fery Andriawan</p>
            <p>All rights reserved.</p>
        </div>
    </div>
</body>
</html>