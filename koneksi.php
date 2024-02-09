<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_akademik';

$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    echo "Gagal konek: " . die(mysqli_connect($koneksi));
}

?>