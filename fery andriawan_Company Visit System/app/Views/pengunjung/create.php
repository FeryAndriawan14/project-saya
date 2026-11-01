<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1>Tambah Pengunjung</h1>
<form action="/pengunjung/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="nama">Nama Pengunjung</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="perusahaan">Perusahaan</label>
        <input type="text" name="perusahaan" class="form-control">
    </div>
    <div class="form-group">
        <label for="nama_departemen">Nama Departemen</label>
        <input type="text" name="nama_departemen" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tujuan">Tujuan</label>
        <input type="text" name="tujuan" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="waktu_masuk">Waktu Masuk</label>
        <input type="datetime-local" name="waktu_masuk" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="waktu_keluar">Waktu Keluar</label>
        <input type="datetime-local" name="waktu_keluar" class="form-control">
    </div>
    <div class="form-group">
        <label for="catatan">Catatan</label>
        <textarea name="catatan" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
