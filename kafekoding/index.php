<?php
define('IN_INDEX', true);
session_start();

// include database and helper functions
require_once __DIR__ . '/koneksi.php';
if (!function_exists('query_view')) {
    include_once __DIR__ . '/function.php';
}

// routing map: map allowed page keys to files
$pages = [
    'home' => 'home.php',
    'create' => 'create.php',
    'tambah_mhs' => 'create.php',
    'data_mhs' => 'data_mahasiswa.php',
    'data_mahasiswa' => 'data_mahasiswa.php',
    'detail_mhs' => 'detail.php',
    'edit_mhs' => 'edit.php',
    'hapus' => 'hapus.php',
    'dashboard' => 'dashboard.php',
    'loginadmin' => 'loginadmin.php',
    'logout' => 'logout.php'
];

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
if (!array_key_exists($page, $pages)) {
    $page = 'home';
}

// helper to build nav links
function nav_active($p, $current) {
    return $p === $current ? 'active' : '';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kafe Koding</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body style="background:#f8fafc;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Kafe Koding</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo nav_active('home', $page); ?>"><a class="nav-link" href="index.php?page=home">Home</a></li>
      <li class="nav-item <?php echo nav_active('create', $page); ?>"><a class="nav-link" href="index.php?page=create">Daftar</a></li>
     
      <li class="nav-item <?php echo nav_active('dashboard', $page); ?>"><a class="nav-link" href="index.php?page=dashboard">Data Peserta</a></li>
    </ul>
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['admin'])): ?>
        <li class="nav-item"><span class="nav-link">Hi, <?php echo htmlspecialchars($_SESSION['admin']); ?></span></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
      <?php else: ?>
        <li class="nav-item <?php echo nav_active('loginadmin', $page); ?>"><a class="nav-link" href="index.php?page=loginadmin">Login</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<main class="container mt-4 mb-5">
    <?php
    // include the requested page safely
    $target = __DIR__ . '/' . $pages[$page];
    if (is_file($target)) {
        include $target;
    } else {
        echo '<div class="alert alert-danger">Halaman tidak ditemukan.</div>';
    }
    ?>
</main>

<footer class="py-4 bg-light mt-auto">
    <div class="container text-center">
        <div class="text-muted">&copy; Kafe Koding - </div>
    </div>
</footer>

<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
