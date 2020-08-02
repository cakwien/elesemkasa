  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mata Pelajaran
        <small>data mata pelajaran </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mata Pelajaran</a></li>
        <li class="active">Data Mata Pelajaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data mapel -->
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
                    <h3 class="box-title">Data Mata Pelajaran</h3>
                    <div class="box-tools">
                        <button data-target="#tambah" data-toggle="modal" class="btn btn-success">TAMBAH DATA</button>
                    </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Tingkat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                $data_mapel=mysqli_query($koneksi,"select * from mapel");
                                while($d = mysqli_fetch_array($data_mapel)){
                            ?>
                            <tr id="<?php echo $d['id_mapel'];?>">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nm_mapel']?></td>
                                <td><?php echo $d['tingkat']?></td>
                                <td>
                                    <button relid="<?php echo $d['id_mapel']?>" class="btn btn-xs btn-warning edit_data">edit</button>
                                    <button nama_delete="<?php echo $d['nm_mapel'];?>" class="btn btn-xs btn-danger remove">hapus</button>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Tingkat</th>
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
        <h4 class="modal-title">Edit Mata Pelajaran</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=mata_pelajaran&aksi=edit_mata_pelajaran">
            <div class="modal-body">
                <div>
                    <div class="form-group">
                    <input type="hidden" class="form-control" name="id_mapel" id="id" >
                    <label for="exampleInputEmail1">Nama Mata Pelajaran </label>
                    <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Nama mapel">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Tingkat</label>
                    <select class="form-control " name="tingkat" id="tingkat" required >
                        <option>-- pilih --</option>  
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
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
        <h4 class="modal-title">Tambah Mata Pelajaran</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=mata_pelajaran&aksi=tambah_mata_pelajaran">
        <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Mata Pelajaran</label>
                  <input type="text" class="form-control" name="nama_mapel" placeholder="Masukkan Nama mapel">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tingkat</label>
                  <select class="form-control " name="tingkat" required >
                    <option>-- pilih --</option>  
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
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

