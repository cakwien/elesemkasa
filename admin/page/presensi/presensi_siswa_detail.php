  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Presensi 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> presensi</a></li>
        <li class="active"> presensi siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- list tugas -->
            <div class="col-md-12 ">
                    <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Presensi Siswa</h3>
                                <div class="user-block pull-right">
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <div class="box-body table-responsive">
                            <p></p>
                            <?php
                            // data profil   
                            $guru_ampu=mysqli_query($koneksi,"select * from ampu left join guru on ampu.id_guru=guru.id_guru left join mapel on mapel.id_mapel=ampu.id_mapel where ampu.id_ampu='$_GET[id_ampu]'");
                            while($dk = mysqli_fetch_array($guru_ampu)){
                                $nama_mapel=$dk['nm_mapel'];
                                $guru_pengajar=$dk['nm_guru'];
                                $id_kelas=$dk['id_kelas'];
                            }    
                            $kelas=mysqli_query($koneksi,"select * from kelas left join guru on guru.id_guru=kelas.id_guru where kelas.id_kelas='$id_kelas'");
                            while($dk = mysqli_fetch_array($kelas)){
                                $nama_kelas=$dk['nm_kelas'];
                                $wali_kelas=$dk['nm_guru'];
                            }     
                            
                            ?>
                            <table>
                                <tr>
                                    <td>Nama Kelas</td>
                                    <td>: <b><?php echo $nama_kelas; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Wali Kelas</td>
                                    <td>: <b><?php echo $wali_kelas; ?></b></td>
                                </tr>
                                <tr>
                                    <td> Mata Pelajaran </td>
                                    <td>: <b><?php echo $nama_mapel; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Guru Mata Pelajaran </td>
                                    <td>: <b><?php echo $guru_pengajar; ?></b></td>
                                </tr>
                            </table>
                            <table class="table table-bordered " style="margin-top:20px;">
                                <thead class="text-center" style="font-weight:700;">
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Nama</td>
                                        <?php
                                        // menentukan jumlah rowspan pada kolom materi
                                        $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$_GET[id_ampu]'");
                                        $jum_materi=mysqli_num_rows($materi);
                                        ?>
                                        <td <?php if($jum_materi==0){ }elseif($jum_materi>=0){ echo "colspan='$jum_materi'"; }?>>Materi</td>
                                        <td colspan="2">Total Siswa Presensi</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        // menentukan nama nama materi 
                                        $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$_GET[id_ampu]'");
                                        $jum_materi=mysqli_num_rows($materi);
                                        if($jum_materi>=1){
                                        while($m = mysqli_fetch_array($materi)){
                                        ?>
                                        <td><?php echo $m['judul'];?></td>
                                        <?php } }else{ ?>
                                        <td></td>
                                        <?php } ?>
                                        <td>Masuk</td>
                                        <td>Tidak Masuk</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // data siswa
                                        $no=1;
                                        $data=mysqli_query($koneksi,"select * from siswa left join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_kelas='$id_kelas'");
                                        while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d['nm_siswa']?></td>
                                            <?php
                                            // menentukan nama nama materi
                                            $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$_GET[id_ampu]'");
                                            $jum_materi=mysqli_num_rows($materi);
                                            $jum_masuk=0;
                                            if($jum_materi>=1){
                                                while($m = mysqli_fetch_array($materi)){
                                                    $notif=mysqli_query($koneksi,"select * from notif where id_materi='$m[id_materi]' and id_siswa='$d[id_siswa]'");
                                                    $jum_notif=mysqli_num_rows($notif);
                                                    if($jum_notif>=1){
                                                        $jum_masuk++;
                                                        $dn=mysqli_fetch_assoc($notif);
                                                    ?>
                                                        <td  class="text-center" style="background-color:#eee; "><?php echo date("d-m-Y",$dn["time"])?></td>
                                                    <?php
                                                    }else{
                                                    ?>
                                                        <td></td>
                                                    <?php
                                                    } 
                                                } 
                                            }else{ ?>
                                                <td></td>
                                            <?php } ?>
                                        <td class="text-center"><?php echo $jum_masuk; ?></td>
                                        <td class="text-center"><?php echo $jum_materi-$jum_masuk; ?></td>
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
        <h4 class="modal-title">Cari Presensi</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=presensi&aksi=cari_presensi_kelas">
            <div class="modal-body">
                <div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bulan</label>
                        <select class="form-control " name="bulan" required >
                            <option>-- pilih --</option>  
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun</label>
                        <select class="form-control " name="tahun" required >
                            <option>-- pilih --</option>  
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
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
