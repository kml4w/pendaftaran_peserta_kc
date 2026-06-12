<?php

include "koneksi.php";

if(!isset($_SESSION['admin'])){
    header("location:index.php?page=loginadmin");
    exit;
}

$data = mysqli_query($kon, "SELECT * FROM peserta");
?>

<h2 class="text-center mb-4">Laporan Data Pendaftaran Peserta</h2>

 <a href="print.php" class="btn btn-success btn-sm">Cetak Data</a>

 

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal </th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Universitas</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['tanggal_daftar']; ?></td>
            <td><?= $row['jenis_kelamin']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['no_hp']; ?></td>
            <td><?= $row['universitas']; ?></td>
            <td><?= $row['kelas']; ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>