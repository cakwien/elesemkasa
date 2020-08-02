  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Presensi Siswa
        <small>data presensi siswa </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Presensi</a></li>
        <li class="active">Data Presensi Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data kelas -->
            <div class="col-md-12 ">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Data Presensi Siswa</h3>
                    <div class="box-tools">
                        <button data-target="#cari" data-toggle="modal" class="btn btn-success">CARI KELAS</button>
                    </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <?php
                    // data kelas
                    $kelas=mysqli_query($koneksi,"select * from kelas left join guru on guru.id_guru=kelas.id_guru where kelas.id_kelas='$_GET[id_kelas]'");
                    while($dk = mysqli_fetch_array($kelas)){
                        $nama_kelas=$dk['nm_kelas'];
                        $wali_kelas=$dk['nm_guru'];
                    }   
                    ?>
                    <table style="margin-bottom:20px;">
                        <tr>
                            <td>Nama Kelas</td>
                            <td>: <b><?php echo $nama_kelas; ?></b></td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>: <b><?php echo $wali_kelas; ?></b></td>
                        </tr>
                    </table>
                    <table id="example1" class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mapel</th>
                                <th>Guru</th>
                                <th class="text-center">Jumlah Materi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                $data_mapel=mysqli_query($koneksi,"select * from ampu left join mapel on mapel.id_mapel=ampu.id_mapel left join guru on guru.id_guru=ampu.id_guru where ampu.id_kelas='$_GET[id_kelas]'");
                                while($d = mysqli_fetch_array($data_mapel)){
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nm_mapel']?></td>
                                <td><?php echo $d['nm_guru']?></td>
                                <?php
                                    $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$d[id_ampu]' ");
                                    $ver_jum_mat=mysqli_num_rows($materi);
                                ?>
                                <td class="text-center"><a href="javascript:void(0)" class="lihat_detail" relid="<?php echo $d['id_ampu'];?>"><?php echo $ver_jum_mat; ?></a></td>
                                <td>
                                    <a href="?page=presensi&presensi=siswa_detail&id_ampu=<?php echo $d['id_ampu']?>" class="btn btn-xs btn-success" target="_blank">lihat</a>
                                    
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mapel</th>
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
<div class="modal fade" id="cari">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cari Kelas</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=presensi&aksi=cari_kelas_siswa">
        <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Wali Kelas</label>
                  <select class="form-control select2" name="id_kelas" style="width: 100%;">
                    <?php
                    $no=1;
                        $kelas=mysqli_query($koneksi,"select * from kelas");
                        while($w = mysqli_fetch_array($kelas)){
                    ?>
                    <option value="<?php echo $w['id_kelas'];?>"><?php echo $w['nm_kelas'];?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
        </div>
        <div class="modal-footer">
            <button type="button" data-backdrop="static" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Cari </button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal edit -->


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


