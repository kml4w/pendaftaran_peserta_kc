<?php
include "koneksi.php";

$id = $_GET['id'];

// ambil data lama
$data = mysqli_query($kon, "SELECT * FROM peserta WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $universitas = $_POST['universitas'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($kon, "
        UPDATE peserta SET
            nama='$nama',
            jenis_kelamin='$jenis_kelamin',
            email='$email',
            no_hp='$no_hp',
            universitas='$universitas',
            kelas='$kelas'
        WHERE id='$id'
    ");

    if($query){
        echo "<script>
            alert('Data berhasil diupdate');
            window.location='index.php?page=dashboard';
        </script>";
    } else {
        echo "<script>
            alert('Gagal update: ".mysqli_error($kon)."');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">

    <h3 class="text-center">Edit Data Peserta</h3>

    <form method="POST">

        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>">
        </div>

        <div class="mb-2">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option><?= $row['jenis_kelamin']; ?></option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $row['email']; ?>">
        </div>

        <div class="mb-2">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="<?= $row['no_hp']; ?>">
        </div>

        <div class="mb-2">
            <label>Universitas</label>
            <input type="text" name="universitas" class="form-control" value="<?= $row['universitas']; ?>">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas" class="form-control">
                <option><?= $row['kelas']; ?></option>
                <option>PHP</option>
                <option>JavaScript</option>
                <option>Database</option>
                <option>HTML</option>
                <option>CSS</option>
                <option>Laravel</option>
            </select>
        </div>

        <button type="submit" name="update" class="btn btn-success">
            Update
        </button>

        <a href="index.php?page=dashboard" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>