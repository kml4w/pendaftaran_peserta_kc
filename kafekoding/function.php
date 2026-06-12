<?php
include_once ("koneksi.php");

function query_view($query_view) {
    global $kon;
    $result = mysqli_query($kon, $query_view);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id_mhs){
    global $kon;
    mysqli_query($kon, "DELETE FROM pendaftaran WHERE id_pendaftaran = $id_mhs");

    return mysqli_affected_rows($kon);
}

function update($data_mhs) {
    global $kon;
    //ambil elemen data
    $id_mahasiswa = $data_mhs["id"];
    $nama = $data_mhs["nama"];
    $tempat_lahir = $data_mhs["tempat_lahir"];
    $tanggal_lahir = $data_mhs["tanggal_lahir"];
    $jns_kelamin = $data_mhs["jns_kelamin"];
    $email = $data_mhs["email"];
    $no_telp = $data_mhs["no_telp"];
    $alamat = $data_mhs["alamat"];
    $pendidikan = $data_mhs["pendidikan"];
    

    //query
    $query = "UPDATE pendaftaran SET
                nama = '$nama',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                jns_kelamin = '$jns_kelamin',
                email = '$email',
                no_telp = '$no_telp',
                alamat = '$alamat',
                pendidikan = '$pendidikan',
                
            WHERE id_pendaftaran = $id_mahasiswa
            ";
    mysqli_query($kon, $query);  
    //var_dump($query);

    return mysqli_affected_rows($kon);
}

?>