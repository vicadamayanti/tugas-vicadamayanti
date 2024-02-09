<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEGAWAI</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahmhs">
    <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA PEGAWAI</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NIK</th>
                <th scope="col">NAMA PEGAWAI</th>
                <th scope="col">BAGIAN</th>
                <th colspan="3" scope="col">AKSI</th>
            </tr>
        </thead>

    <?php
        include 'koneksi.php';

        $query = mysqli_query($koneksi, "SELECT * FROM pegawai");
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
    ?>
                
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nik']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['bagian']; ?></td>
            <td>
                <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                <a href="#" data-toggle="modal" data-target="#editmhs<?php echo $data['nik'];?>">Edit</a>
                <i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
                <a href="#" data-toggle="modal" data-target="#deletemhs<?php echo $data['nik'];?>">Delete</a>
            </td>
        </tr>

        <div class="example-modal">
            <div class="modal fade" id="tambahmhs" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah Data Baru</h3>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_pgw.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIK</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nik" placeholder="NIK"
                                        value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Pegawai</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama
                                        Dosen" value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Bagian </label>
                                        <div class="col-sm-8"><input type="text" name="bagian" class="form-control"
                                        placeholder="Bagian">
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
            <div class="modal fade" id="editmhs<?php echo $data['nik'];?>" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Data Pegawai</h3>
                        </div>
                        <div class="modal-body">
                            <form action="update_pgw.php" method="post" role="form">
                                <?php
                                $nik = $data['nik'];
                                $query1 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nik='$nik'");
                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIK </label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nik" value="<?php echo $data1['nik']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Pegawai</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama" value="<?php echo $data1['nama']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Bagian </label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="bagian" value="<?php echo $data1['bagian']; ?>"></div>
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
            <div id="deletemhs<?php echo $data['nik']; ?>" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                        </div>
                        <div class="modal-body">
                            <h5 align="center" >Apakah anda yakin ingin menghapus pegawai <?php echo
                            $data['nik'];?><strong><span class="grt"></span></strong> ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                            <a href="hapus_pgw.php?nik=<?php echo $data['nik']; ?>" class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
        ?>
    </table>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>