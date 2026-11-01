<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-secondary fw-bold">Daftar Pengunjung</h2>
        <div>
            <a href="/pengunjung/exportExcel" class="btn btn-outline-success shadow-sm">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
            <a href="/pengunjung/exportpdfall" class="btn btn-outline-danger shadow-sm ms-2">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <a href="/pengunjung/create" class="btn btn-primary shadow-sm ms-2">
                <i class="fas fa-plus"></i> Tambah Pengunjung
            </a>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" style="width: 50px;">No</th>
                            <th>Nama</th>
                            <th>Perusahaan</th>
                            <th>Email</th>
                            <th>Departemen</th>
                            <th>Tujuan</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Logika penomoran berdasarkan halaman aktif
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $i = 1 + (($page - 1) * 10); 
                        ?>
                        <?php foreach($pengunjung as $p): ?>
                            <tr>
                                <td class="ps-4"><?= $i++ ?></td>
                                <td class="fw-semibold"><?= esc($p['nama']) ?></td>
                                <td><?= esc($p['perusahaan']) ?></td>
                                <td><small class="text-muted"><?= esc($p['email']) ?></small></td>
                                <td><span class="badge bg-info text-dark"><?= esc($p['nama_departemen']) ?></span></td>
                                <td><?= esc($p['tujuan']) ?></td>
                                <td><?= date('d M Y, H:i', strtotime($p['waktu_masuk'])) ?></td>
                                <td><?= $p['waktu_keluar'] ? date('d M Y, H:i', strtotime($p['waktu_keluar'])) : '<span class="text-muted">-</span>' ?></td>
                                <td class="text-center">
                                    <a href="/pengunjung/edit/<?= $p['visitor_id'] ?>" class="btn btn-sm btn-outline-primary border-0">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/pengunjung/delete/<?= $p['visitor_id'] ?>" method="post" style="display:inline-block;">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Yakin hapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer dengan Pagination yang benar -->
        <div class="card-footer bg-white border-0 py-3 d-flex justify-content-between align-items-center">
            <div class="text-muted small">
                Menampilkan data pengunjung.
            </div>
            <nav aria-label="Page navigation">
                <?php if ($pager) : ?>
                    <?= $pager->links('default', 'custom_pagination') ?>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<?= $this->endSection() ?>