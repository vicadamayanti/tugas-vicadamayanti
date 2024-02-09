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
                <th scope="col">NAMA DOSEN</th>
                <th scope="col">MATA KULIAH</th>
                <th scope="col">HARI</th>
                <th scope="col">JAM</th>
                <th colspan="3" scope="col">AKSI</th>
            </tr>
        </thead>

    <?php
        include 'koneksi.php';

        $query = mysqli_query($koneksi, "SELECT * FROM jadwal");
        while ($data = mysqli_fetch_assoc($query)) {
    ?>
                
        <tr>
            <td><?php echo $data['nj']; ?></td>
            <td><?php echo $data['dosen']; ?></td>
            <td><?php echo $data['pelajaran']; ?></td>
            <td><?php echo $data['hari']; ?></td>
            <td><?php echo $data['jam']; ?></td>
            <td>
                <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                <a href="#" data-toggle="modal" data-target="#editmhs<?php echo $data['nj'];?>">Edit</a>
                <i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
                <a href="#" data-toggle="modal" data-target="#deletemhs<?php echo $data['nj'];?>">Delete</a>
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
                            <form action="simpan_jdl.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nomor Jadwal</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nj" placeholder="Nomor Jadwal"
                                        value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Dosen</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="dosen" placeholder="Nama Dosen" value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Mata Kuliah </label>
                                        <div class="col-sm-8"><input type="text" name="pelajaran" class="form-control"
                                        placeholder="Mata Kuliah">
                                        </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Hari </label>
                                        <div class="col-sm-8"><input type="date" name="hari" class="form-control"
                                        placeholder="Hari">
                                        </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jam</label>
                                        <div class="col-sm-8"><input type="time" name="jam" class="form-control"
                                        placeholder="Jam">
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
            <div class="modal fade" id="editmhs<?php echo $data['nj'];?>" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Data Jadwal</h3>
                        </div>
                        <div class="modal-body">
                            <form action="update_jdl.php" method="post" role="form">
                                <?php
                                $nj = $data['nj'];
                                $query1 = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE nj='$nj'");
                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nomor Jadwal </label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nj" value="<?php echo $data1['nj']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Dosen</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="dosen" value="<?php echo $data1['dosen']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Mata Kuliah </label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="pelajaran" value="<?php echo $data1['pelajaran']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Hari </label>
                                        <div class="col-sm-8"><input type="date" class="form-control" name="hari" value="<?php echo $data1['hari']; ?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jam </label>
                                        <div class="col-sm-8"><input type="time" class="form-control" name="jam" value="<?php echo $data1['jam']; ?>"></div>
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
            <div id="deletemhs<?php echo $data['nj']; ?>" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                        </div>
                        <div class="modal-body">
                            <h5 align="center" >Apakah anda yakin ingin menghapus Nomor Pelajaran <?php echo
                            $data['nj'];?><strong><span class="grt"></span></strong> ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                            <a href="hapus_jdl.php?nj=<?php echo $data['nj']; ?>" class="btn btn-primary">Delete</a>
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