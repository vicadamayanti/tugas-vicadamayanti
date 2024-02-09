<?php include "koneksi.php"; 
        if (isset($_POST['submit'])) {
        $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
        // SQL Prepare
        $sql = "INSERT INTO `mahasiswa`(`nim`, `nama`, `alamat`, `jurusan`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $sql); if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $nim, $nama, $alamat, $jurusan);
        $result = mysqli_stmt_execute($stmt); if ($result) {
        echo "Data Berhasil disimpan"; header('location:index.php');
        } else {
        echo "Data Gagal disimpan " .mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
        } else {
        echo "Error in preparing statement: " . mysqli_error($koneksi);
        }
        mysqli_close($koneksi);
        }
?>
