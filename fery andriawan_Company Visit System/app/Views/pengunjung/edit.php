<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h3 class="fw-bold text-secondary">Edit Data Pengunjung</h3>
                </div>
                <div class="card-body p-4">
                    <form action="/pengunjung/update/<?= $pengunjung['visitor_id'] ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap Perusahaan</label>
                            <input type="text" name="nama" class="form-control" value="<?= esc($pengunjung['nama']) ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                                <input type="datetime-local" name="waktu_masuk" class="form-control" 
                                    value="<?= $pengunjung['waktu_masuk'] ? date('Y-m-d\TH:i', strtotime($pengunjung['waktu_masuk'])) : '' ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                                <input type="datetime-local" name="waktu_keluar" class="form-control" 
                                    value="<?= $pengunjung['waktu_keluar'] ? date('Y-m-d\TH:i', strtotime($pengunjung['waktu_keluar'])) : '' ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= esc($pengunjung['email']) ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="perusahaan" class="form-label">Perusahaan</label>
                                <input type="text" name="perusahaan" class="form-control" value="<?= esc($pengunjung['perusahaan']) ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="department_id" class="form-label">Departemen</label>
                                <select name="department_id" class="form-select">
                                    <?php foreach($departemen as $d): ?>
                                        <option value="<?= $d['department_id'] ?>" <?= $pengunjung['department_id'] == $d['department_id'] ? 'selected' : '' ?>>
                                            <?= esc($d['nama_departemen']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tujuan_id" class="form-label">Tujuan</label>
                                <select name="tujuan_id" class="form-select">
                                    <?php foreach($tujuan as $t): ?>
                                        <option value="<?= $t['tujuan_id'] ?>" <?= $pengunjung['tujuan_id'] == $t['tujuan_id'] ? 'selected' : '' ?>>
                                            <?= esc($t['tujuan']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea name="catatan" class="form-control" rows="3"><?= esc($pengunjung['catatan']) ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/pengunjung" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save"></i> Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>