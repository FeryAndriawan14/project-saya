<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> | Fery Andriawan</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif !important; background-color: #f4f7f6; }
        
        /* Sidebar Premium */
        .sidebar { height: 100vh; width: 260px; position: fixed; background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%); box-shadow: 4px 0 15px rgba(0,0,0,0.1); transition: all 0.3s; z-index: 100; }
        .sidebar .brand { padding: 25px; font-size: 1.2rem; color: white; font-weight: 600; border-bottom: 1px solid rgba(255,255,255,0.1); text-align: center; }
        .sidebar a { color: rgba(255,255,255,0.7); padding: 15px 25px; display: block; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { color: #fff; background: rgba(255,255,255,0.1); border-left: 4px solid #ffc107; }
        
        .content { margin-left: 260px; padding: 30px; }
        .card { border-radius: 20px; border: none; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .btn { border-radius: 8px; font-weight: 500; }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { width: 0; display: none; }
            .content { margin-left: 0 !important; padding: 15px; }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="brand">FERY ANDRIAWAN</div>
        <a href="/dashboard" class="<?= (service('uri')->getSegment(1) == 'dashboard') ? 'active' : '' ?>"><i class="fas fa-th-large me-2"></i> Dashboard</a>
        <a href="/pengunjung" class="<?= (service('uri')->getSegment(1) == 'pengunjung') ? 'active' : '' ?>"><i class="fas fa-users me-2"></i> Pengunjung</a>
        <a href="/dashboard/report"><i class="fas fa-chart-line me-2"></i> Laporan</a>
        <hr class="text-white mx-3">
        <a href="/logout"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </div>

    <div class="content">
        <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMobile">
            <i class="fas fa-bars"></i> Menu
        </button>

        <?= $this->renderSection('content') ?>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMobile" style="background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%); color: white;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">FERY ANDRIAWAN</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <a href="/dashboard" class="text-white text-decoration-none d-block py-2">Dashboard</a>
            <a href="/pengunjung" class="text-white text-decoration-none d-block py-2">Pengunjung</a>
            <a href="/dashboard/report" class="text-white text-decoration-none d-block py-2">Laporan</a>
            <a href="/logout"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>