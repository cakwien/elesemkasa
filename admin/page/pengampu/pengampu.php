  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengampu
        <small>data pengampu  </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pengampu</a></li>
        <li class="active">Data Pengampu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data kelas -->
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
                    <h3 class="box-title">Data Pengampu</h3>
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
                                <th>Nama Mapel</th>
                                <th>Kelas</th>
                                <th>Guru</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                $data_kelas=mysqli_query($koneksi,"select * from ampu left join kelas on ampu.id_kelas=kelas.id_kelas left join guru on ampu.id_guru=guru.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel");
                                while($d = mysqli_fetch_array($data_kelas)){
                            ?>
                            <tr id="<?php echo $d['id_ampu'];?>">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nm_mapel']?></td>
                                <td><?php echo $d['nm_kelas']?></td>
                                <td><?php echo $d['nm_guru']?></td>
                                <td>
                                    <button relid="<?php echo $d['id_ampu']?>" class="btn btn-xs btn-warning edit_data">edit</button>
                                    <button nama_delete="" class="btn btn-xs btn-danger remove">hapus</button>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mapel</th>
                                <th>Kelas</th>
                                <th>Guru</th>
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
        <h4 class="modal-title">Edit Kelas</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=pengampu&aksi=edit_pengampu">
        <div class="modal-body">
              <div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_ampu" id="id" >
                  <label for="exampleInputPassword1">Mata Pelajaran </label>
                  <select class="form-control select2" name="id_mapel" id="id_mapel" style="width: 100%;">
                    <?php
                    $no=1;
                        $mapel=mysqli_query($koneksi,"select * from mapel");
                        while($w = mysqli_fetch_array($mapel)){
                    ?>
                    <option value="<?php echo $w['id_mapel'];?>"><?php echo $w['nm_mapel'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kelas </label>
                  <select class="form-control select2" name="id_kelas" id="id_kelas" style="width: 100%;">
                    <?php
                    $no=1;
                        $wali_kelas=mysqli_query($koneksi,"select * from kelas");
                        while($w = mysqli_fetch_array($wali_kelas)){
                    ?>
                    <option value="<?php echo $w['id_kelas'];?>"><?php echo $w['nm_kelas'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Guru Pengampu </label>
                  <select class="form-control select2" name="id_guru" id="id_guru" style="width: 100%;">
                    <?php
                    $no=1;
                        $wali_kelas=mysqli_query($koneksi,"select * from guru");
                        while($w = mysqli_fetch_array($wali_kelas)){
                    ?>
                    <option value="<?php echo $w['id_guru'];?>"><?php echo $w['nm_guru'];?></option>
                    <?php } ?>
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
        <h4 class="modal-title">Tambah Pengampu</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=pengampu&aksi=tambah_pengampu">
        <div class="modal-body">
              <div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Mata Pelajaran </label>
                  <select class="form-control select2" name="id_mapel"  style="width: 100%;">
                    <?php
                    $no=1;
                        $mapel=mysqli_query($koneksi,"select * from mapel");
                        while($w = mysqli_fetch_array($mapel)){
                    ?>
                    <option value="<?php echo $w['id_mapel'];?>"><?php echo $w['nm_mapel'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kelas </label>
                  <select class="form-control select2" name="id_kelas"  style="width: 100%;">
                    <?php
                    $no=1;
                        $wali_kelas=mysqli_query($koneksi,"select * from kelas");
                        while($w = mysqli_fetch_array($wali_kelas)){
                    ?>
                    <option value="<?php echo $w['id_kelas'];?>"><?php echo $w['nm_kelas'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Guru Pengampu </label>
                  <select class="form-control select2" name="id_guru"  style="width: 100%;">
                    <?php
                    $no=1;
                        $wali_kelas=mysqli_query($koneksi,"select * from guru");
                        while($w = mysqli_fetch_array($wali_kelas)){
                    ?>
                    <option value="<?php echo $w['id_guru'];?>"><?php echo $w['nm_guru'];?></option>
                    <?php } ?>
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

