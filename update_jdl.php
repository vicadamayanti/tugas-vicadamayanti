<?php
// include database connection file
include 'koneksi.php';
$nj= $_POST['nj'];
$dosen=$_POST['dosen'];
$pelajaran=$_POST['pelajaran'];
$hari=$_POST['hari'];
$jam=$_POST['jam'];
$result = mysqli_query($koneksi, "UPDATE jadwal SET
nj='$nj',dosen='$dosen',pelajaran='$pelajaran',hari='$hari',jam='$jam' WHERE nj='$nj'");
// Redirect to homepage to display updated user in list
header("Location: jadwal.php");
?>