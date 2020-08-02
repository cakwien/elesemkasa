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
        <li class="active">data presensi </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <div class="callout callout-info">
                    <h4><b>Informasi :</b></h4>
                    <table>
                        <tr>
                            <td > Kelas</td>
                            <td style="padding-right:30px;">: <?php echo $glob_nama_kelas; ?> </td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>: <?php echo $glob_nama_wali_kelas; ?></td>
                        </tr>
                        
                    </table>
                </div>
            </div>
            <!-- list tugas -->
            <div class="col-md-12 ">
                    <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Presensi Siswa</h3>
                                <div class="user-block pull-right">
                                <button data-toggle="modal" data-target="#cari" class="btn btn-success">Cari Presensi</button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <div class="box-body table-responsive">
                            <p>data presensi ini berdasarkan tanggal siswa melakukan akses pertama kali membuka materi, selebihnya siswa dianggap sudah melakukan presensi pada materi yang telah diapload oleh guru pengampu pelajaran</p>
                            <?php
                            // penentuan tanggal awal dan akhir di bulan tertentu
                            $hari_ini = date("Y-m-d",strtotime($_GET['tanggal_cari']));
                            $bulan = bulan_ini(date('m',strtotime($hari_ini)));
                            $tgl_pertama = date('1', strtotime($hari_ini));
                            $tgl_terakhir = date('t', strtotime($hari_ini));
                            $bln_sort=date('m', strtotime($hari_ini));
                            $thn_sort=date('Y', strtotime($hari_ini));
                            ?>
                            <table class="table table-bordered ">
                                <thead class="text-center" style="font-weight:700;">
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Nama</td>
                                        <td rowspan="2">Guru</td>
                                        <td colspan="<?php echo $tgl_terakhir; ?>"><?php echo $bulan; ?></td>
                                        <td rowspan="2">Total Materi Upload</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        for($a=$tgl_pertama; $a<=$tgl_terakhir; $a++){
                                        ?>
                                            <td><?php echo $a; ?></td>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                        $data=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel where ampu.id_kelas='$glob_id_kelas'");
                                        while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td class="text-left"><?php echo $d['nm_mapel'];?></td>
                                        <td><?php echo $d['nm_guru'];?></td>
                                        <?php
                                        for($a=$tgl_pertama; $a<=$tgl_terakhir; $a++){
                                            $tanggal_cari="$a-$bln_sort-$thn_sort";
                                            $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$d[id_ampu]' ");
                                            $ver_jum_mat=mysqli_num_rows($materi);
                                            if($ver_jum_mat>=1){
                                        ?>
                                                
                                                <?php
                                                $noi=0;
                                                while($m = mysqli_fetch_array($materi)){
                                                $m_awal=date('d-m-Y',$m['time']);
                                                // $m_akhir=date('d',$m['expired']);
                                                $id_materi=$m['id_materi'];
                                                // $m_bulan=date('m',$m['time']);
                                                    if($m_awal==$tanggal_cari){
                                                        $noi++;
                                                        $color="#eee";
                                                    }else{
                                                        $noi='';
                                                        $color="#fff";
                                                    }
                                                }
                                        ?>
                                            <td style="background-color:<?php echo $color; ?>"><?php echo $noi; ?>
                                            </td>
                                            <?php
                                            }else{
                                            ?>
                                                <td></td>
                                            <?php
                                            }
                                            ?>
                                        <?php  }  ?>
                                        <td><?php echo $ver_jum_mat; ?></td>
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
<div class="modal fade" id="cari">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cari Presensi</h4>
        </div>
        <form method="post" action="http://localhost/elearning/siswa/?system=laporan_presensi&aksi=cari">
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
