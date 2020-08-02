  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Siswa
        <small>data siswa </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Siswa</a></li>
        <li class="active">Data Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data siswa -->
            <div class="col-md-12 ">
                <?php
                if($_SESSION['pesan']=='bi'){
                ?>
                <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil disimpan</h5>
                    
                </div>
                <?php
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='be'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil diedit</h5>
                    </div>
                <?php 
                $_SESSION['pesan']='';
                } elseif($_SESSION['pesan']=='bh'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil dihapus</h5>
                    </div>
                <?php 
                $_SESSION['pesan']='';
                } 
                ?>
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Data Siswa</h3>
                    <div class="box-tools">
                        <button data-target="#tambah" data-toggle="modal" class="btn btn-success">TAMBAH DATA</button>
                    </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                $data_siswa=mysqli_query($koneksi,"select * from siswa left join kelas on siswa.id_kelas=kelas.id_kelas");
                                while($d = mysqli_fetch_array($data_siswa)){
                            ?>
                            <tr id="<?php echo $d['id_siswa'];?>">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nm_siswa']?></td>
                                <td><?php echo $d['nm_kelas']?></td>
                                <td><?php echo $d['username']?></td>
                                <td><?php echo $d['password']?></td>
                                <td>
                                    <button relid="<?php echo $d['id_siswa']?>" class="btn btn-xs btn-warning edit_data">edit</button>
                                    <button nama_delete="<?php echo $d['nm_siswa'];?>" class="btn btn-xs btn-danger remove">hapus</button>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama siswa</th>
                                <th>Tingkat</th>
                                <th>Wali siswa</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- modal edit -->
<div class="modal fade" id="editdata">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Siswa</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=siswa&aksi=edit_siswa">
        <div class="modal-body">
              <div>
                <div class="form-group">
                <input type="hidden" class="form-control" name="id_siswa" id="id" >
                  <label for="exampleInputEmail1">Nama siswa</label>
                  <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kelas</label>
                  <select class="form-control select2" name="id_kelas" id="id_kelas" style="width: 100%;">
                    <?php
                    $no=1;
                        $kelas=mysqli_query($koneksi,"select * from kelas");
                        while($w = mysqli_fetch_array($kelas)){
                    ?>
                    <option value="<?php echo $w['id_kelas'];?>"><?php echo $w['nm_kelas'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="date" class="form-control" name="password" id="password"  placeholder="Masukkan Nama Password" required>
                </div>
              </div>
              <!-- /.box-body -->
        </div>
        <div class="modal-footer">
            <button type="button" data-backdrop="static" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan </button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal edit -->

<!-- modal edit -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Siswa</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=siswa&aksi=tambah_siswa">
        <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Siswa</label>
                  <input type="text" class="form-control" name="nama_siswa"  placeholder="Masukkan Nama siswa" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kelas</label>
                  <select class="form-control select2" name="id_kelas"  style="width: 100%;" required>
                    <option>-- pilih --</option>
                    <?php
                    $no=1;
                        $wali_siswa=mysqli_query($koneksi,"select * from kelas");
                        while($w = mysqli_fetch_array($wali_siswa)){
                    ?>
                    <option value="<?php echo $w['id_kelas'];?>"><?php echo $w['nm_kelas'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username"  placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="date" class="form-control" name="password"  placeholder="Masukkan Nama Password" required>
                </div>
              </div>
              <!-- /.box-body -->
        </div>
        <div class="modal-footer">
            <button type="button" data-backdrop="static" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan </button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal edit -->

