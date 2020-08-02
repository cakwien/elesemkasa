  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Presensi Guru
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> presensi</a></li>
        <li class="active">presensi guru </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- list tugas -->
            <div class="col-md-12 ">
                    <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Presensi Guru</h3>
                                <div class="user-block pull-right">
                                <button data-toggle="modal" data-target="#cari" class="btn btn-success">CARI GURU</button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <div class="box-body table-responsive">
                            <?php
                            // data kelas
                            $kelas=mysqli_query($koneksi,"select * from guru where id_guru='$_GET[id_guru]'");
                            while($dk = mysqli_fetch_array($kelas)){
                                $nama_guru=$dk['nm_guru'];
                            }   
                            ?>
                            <table style="margin-bottom:20px;">
                                <tr>
                                    <td>Nama Guru</td>
                                    <td>: <b><?php echo $nama_guru; ?></b></td>
                                </tr>
                            </table>
                            <table class="table table-bordered ">
                                <thead class="text-center" style="font-weight:700;">
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Guru</td>
                                        <td>Jumlah Materi Upload</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                        $data=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel left join kelas on kelas.id_kelas=ampu.id_kelas where ampu.id_guru='$_GET[id_guru]'");
                                        while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td class="text-left"><?php echo $d['nm_mapel'];?></td>
                                        <td><?php echo $d['nm_kelas'];?></td>
                                        <?php
                                            $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$d[id_ampu]' ");
                                            $ver_jum_mat=mysqli_num_rows($materi);
                                        ?>
                                        <td class="text-center"><a href="javascript:void(0)" class="lihat_detail" relid="<?php echo $d['id_ampu'];?>"><?php echo $ver_jum_mat; ?></a></td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                            </div>
                    </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- modal cari -->
<div class="modal fade " id="cari" >
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cari Guru </h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=presensi&aksi=cari_presensi_guru">
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Guru</label>
                  <select class="form-control select2" name="id_guru" id="id_guru" style="width: 100%;">
                    <?php
                    $no=1;
                        $kelas=mysqli_query($koneksi,"select * from guru");
                        while($w = mysqli_fetch_array($kelas)){
                    ?>
                    <option value="<?php echo $w['id_guru'];?>"><?php echo $w['nm_guru'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- /.box-body -->
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Cari </button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal cari -->


<!-- modal lihat detail materi upload -->
<div class="modal fade" id="detail">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Materi Upload Detail</h4>
        </div>
        <div class="modal-body">
              <div id="detail_materi">
              </div>
              <!-- /.box-body -->
        </div>
        <div class="modal-footer">
            <button type="button" data-backdrop="static" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal lihat detail materi upload -->





