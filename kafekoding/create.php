<?php
include 'koneksi.php';

$error = '';
$success = false;
$savedName = '';

// Pastikan tabel peserta ada
$createTable = "CREATE TABLE IF NOT EXISTS peserta (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nama VARCHAR(255) NOT NULL,
	jenis_kelamin VARCHAR(10) NOT NULL,
	email VARCHAR(255) NOT NULL,
	no_hp VARCHAR(50) NOT NULL,
	universitas VARCHAR(255) NOT NULL,
	kelas VARCHAR(100) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
mysqli_query($kon, $createTable);

// Perbaiki kolom lama jika database sudah dibuat dengan nama nohp
$checkNohpColumn = mysqli_query($kon, "SHOW COLUMNS FROM peserta LIKE 'nohp'");
if ($checkNohpColumn && mysqli_num_rows($checkNohpColumn) > 0) {
    mysqli_query($kon, "ALTER TABLE peserta CHANGE COLUMN nohp no_hp VARCHAR(50) NOT NULL");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nama = trim($_POST['nama'] ?? '');
	$jenis = trim($_POST['jenis_kelamin'] ?? '');
	$email = trim($_POST['email'] ?? '');
	$no_hp = trim($_POST['no_hp'] ?? '');
	$universitas = trim($_POST['universitas'] ?? '');
	$kelas = trim($_POST['kelas'] ?? '');

	// Validasi sederhana
	if ($nama === '' || $jenis === '' || $email === '' || $no_hp === '' || $universitas === '' || $kelas === '') {
		$error = 'Semua field harus diisi.';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 'Format email tidak valid.';
	} else {
		// Insert ke database, gunakan prepared statement
		$stmt = mysqli_prepare($kon, "INSERT INTO peserta (nama, jenis_kelamin, email, no_hp, universitas, kelas) VALUES (?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, 'ssssss', $nama, $jenis, $email, $no_hp, $universitas, $kelas);
		$ok = mysqli_stmt_execute($stmt);
		if ($ok) {
			$success = true;
			$savedName = htmlspecialchars($nama, ENT_QUOTES);
		} else {
			$error = 'Gagal menyimpan data: ' . mysqli_error($kon);
		}
		mysqli_stmt_close($stmt);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftar Peserta</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background:#f8f9fa;">

<div class="container mt-4">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Form Pendaftaran Peserta</h4>

					<?php if ($error !== ''): ?>
						<div class="alert alert-danger"><?php echo $error; ?></div>
					<?php endif; ?>

					<?php if ($success): ?>
						<div class="alert alert-success">
							Selamat <?php echo $savedName; ?>, data berhasil disimpan.
						</div>
						<div class="text-right">
							<a href="index.php?page=home" class="btn btn-primary">OK</a>
						</div>
					<?php else: ?>

					<form method="post">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($_POST['nama'] ?? '', ENT_QUOTES); ?>" required>
						</div>

						<div class="form-group mt-2">
							<label>Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control" required>
								<option value="">-- Pilih --</option>
								<option value="L" <?php if(($_POST['jenis_kelamin'] ?? '') === 'L') echo 'selected'; ?>>Laki-laki</option>
								<option value="P" <?php if(($_POST['jenis_kelamin'] ?? '') === 'P') echo 'selected'; ?>>Perempuan</option>
							</select>
						</div>

						<div class="form-group mt-2">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>" required>
						</div>

						<div class="form-group mt-2">
							<label>No HP</label>
			<input type="text" name="no_hp" class="form-control" value="<?php echo htmlspecialchars($_POST['no_hp'] ?? '', ENT_QUOTES); ?>" required>
		</div>
							<label>Universitas</label>
							<input type="text" name="universitas" class="form-control" value="<?php echo htmlspecialchars($_POST['universitas'] ?? '', ENT_QUOTES); ?>" required>
						</div>

						<div class="form-group mt-2">
							<label>Kelas</label>
							<select name="kelas" class="form-control" required>
								<option value="">-- Pilih --</option>
								<option value="php" <?php if(($_POST['kelas'] ?? '') === 'php') echo 'selected'; ?>>PHP</option>
								<option value="laravel" <?php if(($_POST['kelas'] ?? '') === 'laravel') echo 'selected'; ?>>Laravel</option>
								<option value="database" <?php if(($_POST['kelas'] ?? '') === 'database') echo 'selected'; ?>>Database</option>
								<option value="css" <?php if(($_POST['kelas'] ?? '') === 'css') echo 'selected'; ?>>CSS</option>
								<option value="html" <?php if(($_POST['kelas'] ?? '') === 'html') echo 'selected'; ?>>HTML</option>
								<option value="javascript" <?php if(($_POST['kelas'] ?? '') === 'javascript') echo 'selected'; ?>>JavaScript</option>
							</select>
						</div>

						<div class="mt-3 d-flex justify-content-between">
							<a href="index.php?page=home" class="btn btn-secondary">Kembali</a>
							<button type="submit" class="btn btn-success">Daftar</button>
						</div>
					</form>

					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php if (!defined('IN_INDEX')): ?>
</body>
</html>
<?php endif; ?>
