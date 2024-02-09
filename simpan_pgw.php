<?php
include 'koneksi.php';

$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$bagian = mysqli_real_escape_string($koneksi, $_POST['bagian']);

$query = "INSERT INTO pegawai (nik, nama, bagian) VALUES ('$nik', '$nama', '$bagian')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "Data Berhasil Disimpan";
    header("location: pegawai.php");
} else {
    echo "Gagal Disimpan. Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
