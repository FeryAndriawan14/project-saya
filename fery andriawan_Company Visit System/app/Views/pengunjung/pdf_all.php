<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengunjung</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Pengunjung</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Perusahaan</th>
                <th>Email</th>
                <th>Departemen</th> <th>Tujuan</th>     <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pengunjung)): ?>
                <?php foreach($pengunjung as $p): ?>
                    <tr>
                        <td><?= isset($p['nama']) ? esc($p['nama']) : 'N/A' ?></td>
                        <td><?= isset($p['perusahaan']) ? esc($p['perusahaan']) : 'N/A' ?></td>
                        <td><?= isset($p['email']) ? esc($p['email']) : 'N/A' ?></td>
                        <td><?= isset($p['nama_departemen']) ? esc($p['nama_departemen']) : '-' ?></td>
                        <td><?= isset($p['tujuan']) ? esc($p['tujuan']) : '-' ?></td>
                        <td><?= isset($p['waktu_masuk']) ? esc($p['waktu_masuk']) : 'N/A' ?></td>
                        <td><?= isset($p['waktu_keluar']) ? esc($p['waktu_keluar']) : 'N/A' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Tidak ada data pengunjung.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>