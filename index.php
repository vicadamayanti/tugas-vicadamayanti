<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAHASISWA</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahmhs">
    <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA MAHASISWA</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NIM</th>
                <th scope="col">NAMA MAHASISWA</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">JURUSAN</th>
                <th colspan="3" scope="col">AKSI</th>
            </tr>
        </thead>

        <?php include "koneksi.php";
$sql = "SELECT * FROM mahasiswa";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) < 1) : ?>
<tr>
<td colspan="100%">Tidak ada data yang ditemukan !</td>
</tr>
<?php
endif;
foreach ($query as $key => $value) :
?>

<tr>
<td><?= $key + 1 ?></td>
<td><?= htmlspecialchars( $value['nim'] ) ?></td>
<td><?= htmlspecialchars( $value['nama'] ) ?></td>
<td><?= htmlspecialchars( $value['alamat'] ) ?></td>
<td><?= htmlspecialchars( $value['jurusan'] ) ?></td>
<td>
<a href="edit_mhs.php?nim=<?= htmlspecialchars( $value['nim'] ) ?>"
class="btn btn-warning btn-sm p-2 text-white rounded">
<i class="fas fa-edit mr-2"></i> Edit</a>
<a href="hapus_mhs.php?nim=<?= htmlspecialchars( $value['nim'] ) ?>"
onclick="return confirm('Apakah Anda yakin ingin menghapus ?')"
class="btn btn-danger btn-sm p-2 text-white rounded">
<i class="fas fa-trash-alt mr-2"></i> Hapus</a>
</td>
</tr>
<?php endforeach; ?>

        <div class="example-modal">
            <div class="modal fade" id="tambahmhs" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah Data Baru</h3>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_mhs.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIM</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nim" placeholder="NIM"
                                        value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Alamat</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                        id="alamat" value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jurusan </label>
                                        <div class="col-sm-8"><input type="text" name="jurusan" class="form-control"
                                        placeholder="Jurusan">
                                        </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        
        <div class="example-modal">
            <div class="modal fade" id="editmhs<?php echo $data['nim'];?>" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Data Mahasiswa</h3>
                        </div>
                        <div class="modal-body">
                            <form action="update_mhs.php" method="post" role="form">
                                <?php
                                $nim = $data['nim'];
                                $query1 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIM </label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nim" value="<?php echo $data1['nim']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama" value="<?php echo $data1['nama']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Alamat </label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="alamat" value="<?php echo $data1['alamat']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jurusan </label>
                                        <div class="col-sm-8"><input type="text" name="jurusan" class="form-control" value="<?php echo
                                        $data1['jurusan']; ?>">
                                        </input></div> 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                </div>
                                <?php
                                }
                                ?>
                            </form> 
                        </div> 
                    </div> 
                </div> 
            </div>
        </div>

        <!-- Modal Delete -->

        <div class="example-modal">
            <div id="deletemhs<?php echo $data['nim']; ?>" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                        </div>
                        <div class="modal-body">
                            <h5 align="center" >Apakah anda yakin ingin menghapus mahasiswa <?php echo
                            $data['nim'];?><strong><span class="grt"></span></strong> ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                            <a href="hapus_mhs.php?nim=<?php echo $data['nim']; ?>" class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </table>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>