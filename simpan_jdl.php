<?php
include 'koneksi.php';
$nj = $_POST['nj'];
$dosen = $_POST['dosen'];
$pelajaran= $_POST['pelajaran'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$input = mysqli_query($koneksi,"INSERT INTO jadwal
VALUES('$nj','$dosen','$pelajaran','$hari','$jam')") or die(mysql_error());
if($input){
echo "Data Berhasil Disimpan";
header("location:jadwal.php");
}else{
echo "Gagal Disimpan";
}
?>