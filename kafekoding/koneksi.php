<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "crud_pendaftaran";

$kon = mysqli_connect($host, $user, $password, $db);

if (!$kon){
    die("Koneksi gagal: " . mysqli_connect_error());
}

/* =========================
   AUTO CREATE ADMIN DEFAULT
   (sekali jalan saja)
========================= */

$cek_admin = mysqli_query($kon, "SELECT * FROM admin LIMIT 1");

if($cek_admin && mysqli_num_rows($cek_admin) == 0){

    mysqli_query($kon, "
        INSERT INTO admin (username, password)
        VALUES ('admin', '123456')
    ");

}
?>