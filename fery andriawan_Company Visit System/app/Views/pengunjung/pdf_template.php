<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengunjung</title>
</head>
<body>
    <h1>Detail Pengunjung</h1>
    <p><strong>Nama:</strong> <?= $pengunjung['nama'] ?></p>
    <p><strong>Email:</strong> <?= $pengunjung['email'] ?></p>
    <p><strong>Perusahaan:</strong> <?= $pengunjung['perusahaan'] ?></p>
    <p><strong>Departemen:</strong> <?= $pengunjung['nama_departemen'] ?></p>
    <p><strong>Tujuan:</strong> <?= $pengunjung['tujuan'] ?></p>
    <p><strong>Waktu Masuk:</strong> <?= $pengunjung['waktu_masuk'] ?></p>
    <p><strong>Waktu Keluar:</strong> <?= $pengunjung['waktu_keluar'] ?></p>
    <p><strong>Catatan:</strong> <?= $pengunjung['catatan'] ?></p>
</body>
</html>
