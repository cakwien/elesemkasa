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
            
            <div class="col-md-8 col-md-offset-2">
                <!-- pesan -->
                <?php
                if($_SESSION['pesan']=='td'){
                ?>
                <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> diskusi berhasil ditambahkan</h5>
                    
                </div>
                <?php
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='tk'){
                    ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> komentar berhasil ditambahkan</h5>
                        
                    </div>
                    <?php
                    $_SESSION['pesan']='';
                    }
                ?>
                <!-- pesan -->
                <div class="callout callout-info">
                    <h4><b>Informasi :</b></h4>
                    <?php
                        $data=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu  left join guru on guru.id_guru=ampu.id_guru left join mapel on mapel.id_mapel=ampu.id_mapel where  materi.id_materi='$_GET[id_materi]'");
                        while($d = mysqli_fetch_array($data)){
                    ?>
                    <table>
                        <tr>
                            <td > Mata Pelajaran</td>
                            <td style="padding-right:30px;">: <?php echo $d['nm_mapel']; ?> </td>
                            <td >diposting</td>
                            <td >: <?php echo hari_ini(date('D',strtotime(date('Y-m-d',($d['time'])))));?>, <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($d['time']))))); ?> <?php echo date("H:i:s",$d['time']);?> </td>
                        </tr>
                        <tr>
                            <td>Guru Pengajar</td>
                            <td>: <?php echo $d['nm_guru']; ?> </td>
                            <td>ditutup</td>
                            <td>: <?php echo hari_ini(date('D',strtotime(date('Y-m-d',($d['expired'])))));?>, <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($d['expired']))))); ?> <?php echo date("H:i:s",$d['expired']);?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <!-- list tugas -->
            <?php
                $data=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu  left join guru on guru.id_guru=ampu.id_guru left join mapel on mapel.id_mapel=ampu.id_mapel where  materi.id_materi='$_GET[id_materi]'");
                while($d = mysqli_fetch_array($data)){
            ?>
            <div class="col-md-8 col-md-offset-2 ">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="pull-left">
                            <div class="user-block">
                                <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><a href="#"><?php echo $d['judul']?></a></span>
                                <span class="description">Jenis Materi : <?php if($d['jenis']=='1'){ echo "teks";}elseif($d['jenis']=='2'){ echo "file";}elseif($d['jenis']=='3'){ echo "link / youtube";}?></span>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- post text -->
                        <p><?php echo $d['ket'];?></p>

                        <?php
                        if($d['jenis']==1){
                        ?>
                        <?php
                        }elseif($d['jenis']==2){
                        ?>
                        <!-- Attachment -->
                        <div class="attachment-block clearfix">
                                <img class="attachment-img" src="../assets/dist/img/photo1.png" alt="Attachment Image">
                                <div class="attachment-pushed">
                                <h4 class="attachment-heading">File </h4>
                                <div class="attachment-text">
                                    Materi dapat di download dengan sekali klik
                                    <div style="padding-top:15px;">
                                    <a href="http://localhost/elearning/file/<?php echo $d['file'];?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i> Download Materi</a>
                                    </div>
                                </div>
                                <!-- /.attachment-text -->
                                </div>
                                <!-- /.attachment-pushed -->
                            </div>
                        <!-- /.attachment-block -->
                        <?php
                        }elseif($d['jenis']==3){
                        ?>
                        <!-- Attachment -->
                        <div class="attachment-block clearfix">
                                <img class="attachment-img" src="../assets/dist/img/photo1.png" alt="Attachment Image">
                                <div class="attachment-pushed">
                                <h4 class="attachment-heading">Link / Youtube </h4>
                                <div class="attachment-text">
                                    Materi dapat di lihat dengan sekali klik
                                    <div style="padding-top:15px;">
                                    <a href="<?php echo $d['link'];?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-link"></i> Buka Link</a>
                                    </div>
                                </div>
                                <!-- /.attachment-text -->
                                </div>
                                <!-- /.attachment-pushed -->
                            </div>
                        <!-- /.attachment-block -->
                        <?php
                        }
                        ?>

                        <!-- Social sharing buttons -->
                        <button data-toggle="modal" data-target="#tambah" type="button" class="btn btn-default btn-xs"><i class="fa fa-group"></i> Tambah Diskusi</button>
                        <span class="pull-right text-muted">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi,"select * from post where id_materi='$d[id_materi]'")); ?>
                         diskusi 
                         </span>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <?php
            $diskusi=mysqli_query($koneksi,"select * from post where id_materi='$d[id_materi]'");
            while($disk=mysqli_fetch_array($diskusi)){
                if($disk['tipe']=='0'){
                    $akun_disk=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru where id_ampu='$disk[id_user]'");
                    $data_akun_disk=mysqli_fetch_assoc($akun_disk);
                    $nama_disk=$data_akun_disk['nm_guru'];
                    $tipe_disk="<span class='label label-success'>guru</span>";
                }elseif($disk['tipe']=='1'){
                    $akun_disk=mysqli_query($koneksi,"select * from siswa where id_siswa='$disk[id_user]'");
                    $data_akun_disk=mysqli_fetch_assoc($akun_disk);
                    $nama_disk=$data_akun_disk['nm_siswa'];
                    $tipe_disk="<span class='label label-warning'>siswa</span>";
                }
            ?>
            <div class="col-md-8 col-md-offset-2 ">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="pull-left">
                            <div class="user-block">
                                <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><a href="#"><?php echo $nama_disk;?> </a> <?php echo $tipe_disk;?></span>
                                <span class="description">
                                Memulai diskusi <?php echo hari_ini(date('D',strtotime(date('Y-m-d',($disk['time'])))));?>, <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($disk['time']))))); ?> <?php echo date("H:i:s",$disk['time']);?>
                                </span>
                            </div>
                        </div>
                        <div class="pull-right">
                        <?php if($disk['tipe']==1 and $glob_id_siswa==$disk['id_user']){ ?>
                            <button type="button" class="btn btn-box-tool hapus-diskusi" id="<?php echo $disk['id_post'];?>"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-box-tool edit-diskusi" id="<?php echo $disk['id_post'];?>"><i class="fa fa-pencil"></i></button>
                        <?php } ?>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>
                        <?php echo $disk['isi']; ?>
                        </p>
                        <!-- Social sharing buttons -->
                        <span class="pull-right text-muted">
                        <?php
                        echo mysqli_num_rows(mysqli_query($koneksi,"select * from reply where id_post='$disk[id_post]'"));
                        ?>
                         komentar 
                         </span>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer box-comments">
                        <?php
                            $data_reply=mysqli_query($koneksi,"select * from reply where id_post='$disk[id_post]'");
                            while($reply=mysqli_fetch_array($data_reply)){
                                if($reply['tipe']=='0'){
                                    $akun_reply=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru where id_ampu='$reply[id_user]'");
                                    $data_akun_reply=mysqli_fetch_assoc($akun_reply);
                                    $nama_reply=$data_akun_reply['nm_guru'];
                                    $tipe_reply="<span class='label label-success'>guru</span>";
                                }elseif($reply['tipe']=='1'){
                                    $akun_reply=mysqli_query($koneksi,"select * from siswa where id_siswa='$reply[id_user]'");
                                    $data_akun_reply=mysqli_fetch_assoc($akun_reply);
                                    $nama_reply=$data_akun_reply['nm_siswa'];
                                    $tipe_reply="<span class='label label-warning'>siswa</span>";
                                }
                        ?>
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../assets/dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                <?php echo $nama_reply; echo " "; echo $tipe_reply;  ?> 
                                    <span class="text-muted pull-right"><?php echo hari_ini(date('D',strtotime(date('Y-m-d',($reply['time'])))));?>, <?php echo tgl_indo(date('Y-m-d',strtotime(date('Y-m-d',($reply['time']))))); ?> <?php echo date("H:i:s",$reply['time']);?></span>
                                </span><!-- /.username -->
                            <?php echo $reply['isi'];?>
                            <?php if($reply['tipe']==1 and $glob_id_siswa==$reply['id_user']){ ?>
                                <div>
                                    <a href="javascript:void(0)" id="<?php echo $reply['id_reply'];?>" class="label label-default btn-xs hapus-reply"><i class="fa fa-trash"></i> hapus</a> <a href="javascript:void(0)" id="<?php echo $reply['id_reply'];?>" class="label label-default btn-xs edit-komentar"><i class="fa fa-pencil"></i> edit</a>
                                </div>
                            <?php } ?>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                            <?php } ?>
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="http://localhost/elearning/siswa/?system=detail_tugas&aksi=tambah_komentar&id_materi=<?php echo $_GET['id_materi']; ?>" method="post">
                            <img class="img-responsive img-circle img-sm" src="../assets/dist/img/user4-128x128.jpg" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                            <input type="hidden" name="id_post" value="<?php echo $disk['id_post'];?>">
                            <input type="text" name="komentar" class="form-control input-sm" placeholder="masukkan komentar disini">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <?php } } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- modal tambah diskusi -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Diskusi</h4>
        </div>
        <form method="post" action="http://localhost/elearning/siswa/?system=detail_tugas&aksi=tambah_diskusi">
        <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Diskusi</label>
                  <input type="hidden" name="id_materi" value="<?php echo $_GET['id_materi'];?>">
                  <textarea  class="form-control" name="diskusi" placeholder="Masukkan Diskusi"></textarea>
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
<!-- /.modal tambah diskusi -->

<!-- modal edit diskusi -->
<div class="modal fade" id="edit_diskusi">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Diskusi</h4>
        </div>
        <form method="post" action="http://localhost/elearning/siswa/?system=detail_tugas&aksi=edit_diskusi">
        <div class="modal-body">
              <div>
                <div>
                  <input type="hidden" name="id_diskusi" id="id_diskusi_edit">
                  <input type="hidden" name="id_materi" value="<?php echo $_GET['id_materi'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pendiskusi</label>
                  <input type="text" class="form-control" id="nm_pendiskusi" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis</label>
                  <input type="text" class="form-control" id="tipe_pendiskusi" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Diskusi</label>
                  
                  <textarea  class="form-control" name="diskusi" id="desk_diskusi" placeholder="Masukkan Diskusi"></textarea>
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
<!-- /.modal edit diskusi -->

<!-- modal edit komentar -->
<div class="modal fade" id="edit_komentar">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Komentar</h4>
        </div>
        <form method="post" action="http://localhost/elearning/siswa/?system=detail_tugas&aksi=edit_komentar">
        <div class="modal-body">
              <div>
                <div>
                  <input type="hidden" name="id_komentar" id="id_komentar_edit">
                  <input type="hidden" name="id_materi" value="<?php echo $_GET['id_materi'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pengomentar</label>
                  <input type="text" class="form-control" id="nm_pengomentar" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis</label>
                  <input type="text" class="form-control" id="tipe_pengomentar" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Komentar</label>
                  
                  <textarea  class="form-control" name="komentar" id="desk_pengomentar" placeholder="Masukkan Diskusi"></textarea>
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
<!-- /.modal edit komentar -->





