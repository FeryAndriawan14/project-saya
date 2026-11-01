<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-5 px-4">
    <div class="mb-5 d-flex align-items-center justify-content-between">
        <div>
            <h1 class="h2 fw-bolder text-dark mb-1">Dashboard</h1>
            <p class="text-secondary fs-6">Selamat datang kembali, Admin. Berikut ringkasan sistem hari ini.</p>
        </div>
        <div class="text-end text-muted small">
            <?= date('d F Y') ?>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-5">
        <?php 
        $stats = [
            ['title' => 'Total Pengunjung', 'value' => $total_pengunjung ?? 0, 'icon' => 'fa-users', 'color' => '#6366f1'],
            ['title' => 'Hari Ini', 'value' => $pengunjung_hari_ini ?? 0, 'icon' => 'fa-calendar-day', 'color' => '#22c55e'],
            ['title' => 'Departemen', 'value' => $jumlah_departemen ?? 0, 'icon' => 'fa-building', 'color' => '#06b6d4']
        ];
        foreach ($stats as $stat): ?>
        <div class="col-xl-4 col-md-6">
            <div class="stat-card border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="icon-box shadow-sm" style="background: #fff; color: <?= $stat['color'] ?>; border: 1px solid #f0f0f0;">
                        <i class="fas <?= $stat['icon'] ?>"></i>
                    </div>
                    <div class="ms-4">
                        <span class="text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;"><?= $stat['title'] ?></span>
                        <h2 class="fw-bolder mb-0 mt-1"><?= number_format($stat['value']) ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Action Cards -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="action-card h-100 border-0 shadow-sm d-flex flex-column">
                <div class="badge-custom bg-tosca-light text-tosca mb-3 align-self-start">Analisis Data</div>
                <h4 class="fw-bold text-dark">Visualisasi Statistik</h4>
                <p class="text-muted flex-grow-1">Pantau tren kunjungan dan kinerja departemen secara mendalam melalui modul pelaporan.</p>
                <a href="/dashboard/report" class="btn-custom bg-tosca mt-3">Lihat Grafik Statistik <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="action-card h-100 border-0 shadow-sm d-flex flex-column">
                <div class="badge-custom bg-primary-light text-primary mb-3 align-self-start">Operasional</div>
                <h4 class="fw-bold text-dark">Manajemen Data</h4>
                <p class="text-muted flex-grow-1">Kelola data pengunjung, tambahkan entri baru, atau ekspor laporan ke Excel dan PDF.</p>
                <a href="/pengunjung" class="btn-custom bg-primary mt-3">Kelola Data Pengunjung <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Premium UI Enhancements */
    .stat-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }
    .icon-box {
        width: 65px;
        height: 65px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }
    .action-card {
        background: #ffffff;
        padding: 40px;
        border-radius: 30px;
    }
    .badge-custom {
        padding: 6px 16px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-custom {
        padding: 14px 28px;
        border-radius: 16px;
        color: white;
        text-decoration: none;
        display: inline-block;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-custom:hover { opacity: 0.9; color: white; transform: scale(1.02); }
    
    /* Colors */
    .bg-tosca { background-color: #20c997 !important; }
    .bg-tosca-light { background-color: rgba(32, 201, 151, 0.1); }
    .text-tosca { color: #20c997; }
    
    .bg-primary { background-color: #4f46e5 !important; }
    .bg-primary-light { background-color: rgba(79, 70, 229, 0.1); }
    .text-primary { color: #4f46e5; }
</style>

<?= $this->endSection() ?>