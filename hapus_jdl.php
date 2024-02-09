<?php
// include database connection file
include 'koneksi.php';
$nj = $_GET['nj'];
$result = mysqli_query($koneksi, "DELETE FROM jadwal WHERE nj='$nj'");
header("Location:jadwal.php");
?>