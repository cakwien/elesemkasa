  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Guru
        <small>data guru </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Guru</a></li>
        <li class="active">Data Guru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data guru -->
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
                    <h3 class="box-title">Data Guru</h3>
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
                                <th>Nama Guru</th>
                                <th>Kode Guru</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                $data_guru=mysqli_query($koneksi,"select * from guru");
                                while($d = mysqli_fetch_array($data_guru)){
                            ?>
                            <tr id="<?php echo $d['id_guru'];?>">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nm_guru']?></td>
                                <td><?php echo $d['kd_guru']?></td>
                                <td><?php echo $d['username']?></td>
                                <td><?php echo $d['password']?></td>
                                <td>
                                    <button relid="<?php echo $d['id_guru']?>" class="btn btn-xs btn-warning edit_data">edit</button>
                                    <button nama_delete="<?php echo $d['nm_guru'];?>" class="btn btn-xs btn-danger remove">hapus</button>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Guru</th>
                                <th>Kode Guru</th>
                                <th>Username</th>
                                <th>Password</th>
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
        <h4 class="modal-title">Edit Guru</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=guru&aksi=edit_guru">
        <div class="modal-body">
              <div>
                <div class="form-group">
                <input type="hidden" class="form-control" name="id_guru" id="id" >
                  <label for="exampleInputEmail1">Nama guru</label>
                  <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Nama Guru">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Guru</label>
                  <input type="text" class="form-control" name="kd_guru" id="kd_guru" placeholder="Kode Guru">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password">
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
        <h4 class="modal-title">Tambah guru</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=guru&aksi=tambah_guru">
        <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama guru</label>
                  <input type="text" class="form-control" name="nama_guru1" placeholder="Masukkan Nama Guru">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Guru</label>
                  <input type="text" class="form-control" name="kd_guru1"  placeholder="Masukkan Kode Guru">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username1" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control" name="password1" placeholder="Masukkan Password">
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

