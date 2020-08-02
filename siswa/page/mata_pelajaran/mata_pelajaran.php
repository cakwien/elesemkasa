  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mata Pelajaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> mata pelajaran</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
            <div class="col-md-8 col-md-offset-2 ">
                <?php
                $no=1;
                    $data=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel where ampu.id_kelas='$glob_id_kelas'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <div class="pull-left">
                                    <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                    <span class="username">
                                        <a href="#"><?php echo $d['nm_mapel'];?></a> 
                                        <?php
                                        $i=0;
                                        $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$d[id_ampu]'");
                                        while($m = mysqli_fetch_array($materi)){
                                            $notif_read=mysqli_num_rows(mysqli_query($koneksi,"select * from notif where id_materi='$m[id_materi]' and id_siswa='$glob_id_siswa'"));
                                            if($notif_read==0){
                                                $i=$i+1;
                                            }
                                        }
                                        ?>
                                        <?php
                                        if($i>0){
                                        ?>
                                            <span class="label label-danger label-xs"><?php echo $i; ?> tugas baru</span>
                                        <?php
                                        }else{ }
                                        ?>
                                        
                                    </span>
                                    <span class="description"><?php echo $d['nm_guru'];?> </span>
                                </div>
                                <div class="pull-right" style="padding-top:5px; ">
                                    <a href="?page=mata_pelajaran_detail&id_ampu=<?php echo $d['id_ampu'];?>" class="btn btn-sm btn-success" >Lihat Mata Pelajaran</a>
                                </div>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                    </div>
                <?php $no++;  } ?>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
