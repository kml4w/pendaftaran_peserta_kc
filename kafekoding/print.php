<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if(!isset($_SESSION['admin'])){
    header('location:index.php?page=loginadmin');
    exit;
}

// ambil data peserta
$rows = [];
$res = mysqli_query($kon, "SELECT * FROM peserta ORDER BY id ASC");
while($r = mysqli_fetch_assoc($res)) $rows[] = $r;

// Tampilkan halaman cetak yang bersih: tidak ada tombol aksi, hanya tabel data
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cetak Data Peserta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body { background: #fff; color: #111; font-family: Arial, Helvetica, sans-serif; }
        .print-container { margin: 10px auto; max-width: 1200px; }
        h2 { text-align: center; margin-bottom: 18px; }
        table { width:100%; border-collapse: collapse; font-size:13px; }
        table th, table td { border:1px solid #ddd; padding:8px; }
        table th { background:#f7f7f7; text-align:left; }
        @media print {
            /* pastikan tidak ada tombol atau link tampil saat dicetak */
            a, button { display: none !important; }
        }
    </style>
</head>
<body>

<div class="print-container">
    <button onclick="window.print()" class="btn btn-primary mb-3">
     Print Data
</button>
    <h2>Laporan Data Pendaftaran Peserta</h2>
    <table>
        <thead>
            <tr>
                <th style="width:50px">No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Universitas</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($rows as $row): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_daftar'] ?? $row['created_at'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['no_hp'] ?? $row['no_telp'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['universitas'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['kelas'] ?? ''); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
