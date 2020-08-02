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
        <li class="active">mata pelajaran detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            $no=1;
                $data=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel left join kelas on kelas.id_kelas=ampu.id_kelas where ampu.id_ampu='$_GET[id_ampu]'");
                while($d = mysqli_fetch_array($data)){
            ?>
            <div class="col-md-8 col-md-offset-2">
                <div class="callout callout-info">
                    <h4><b>Informasi :</b></h4>
                    <table>
                        <tr>
                            <td > Mata Pelajaran</td>
                            <td style="padding-right:30px;">: <?php echo $d['nm_mapel']; ?> </td>
                        </tr>
                        <tr>
                            <td>Guru Pengajar</td>
                            <td>: <?php echo $d['nm_guru']; ?> </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: <?php echo $d['nm_kelas']; ?> </td>
                        </tr>
                        
                    </table>
                </div>
            </div>
            <!-- list tugas -->
            <?php
            $data_list=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu left join guru on guru.id_guru=ampu.id_guru where materi.id_ampu='$_GET[id_ampu]'");
            while($dl = mysqli_fetch_array($data_list)){
            ?>
            <div class="col-md-8 col-md-offset-2 ">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <div class="pull-left">
                                <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username">
                                    <a href="#"><?php echo $dl['nm_guru'];?></a>
                                    <?php
                                    $notif_read=mysqli_num_rows(mysqli_query($koneksi,"select * from notif where id_materi='$dl[id_materi]' and id_siswa='$glob_id_siswa'"));
                                    if($notif_read>=1){
                                    ?>
                                        <span class="label label-warning label-xs">sudah dibaca </span>
                                    <?php
                                    }elseif($notif_read==0){
                                    ?>
                                    <span class="label label-danger label-xs">belum dibaca</span>
                                    <?php } ?>
                                </span>
                                <span class="description"> <?php echo $dl['judul'];?> | <?php echo hari_ini(date('D',strtotime(date('Y-m-d',($d['time'])))));?>, <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($dl['time']))))); ?> <?php echo date("H:i:s",$dl['time']);?></span>
                            </div>
                            <div class="pull-right" style="padding-top:5px; ">
                                <a href="?page=detail_tugas&id_materi=<?php echo $dl['id_materi'];?>" class="btn btn-sm btn-success" >Lihat Materi</a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
