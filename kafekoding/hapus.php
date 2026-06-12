<?php
include "koneksi.php";

if(!isset($_GET['id']) || empty($_GET['id'])){
    header("location:index.php?page=dashboard");
    exit;
}

$id = mysqli_real_escape_string($kon, $_GET['id']);
mysqli_query($kon, "DELETE FROM peserta WHERE id='$id'");

header("location:index.php?page=dashboard");
exit;
?>