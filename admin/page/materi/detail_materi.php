  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Materi
        <small>data materi </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Materi</a></li>
        <li class="active">Detail Materi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data detail materi dan lain lain -->
            <div class="col-md-8 col-md-offset-2 ">
              <!-- pesan -->
              <?php
                if($_SESSION['pesan']=='ge'){
                ?>
                <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> <b>gagal!</b>  ekstensi file yang dimasukkan tidak diizinkan </h5>
                    
                </div>
                <?php
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='bi'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil disimpan</h5>
                    </div>
                <?php 
                $_SESSION['pesan']='';
                } elseif($_SESSION['pesan']=='gu'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>gagal!</b> ukuran file yang diupload melebihi ukuran yang sudah di tentukan </h5>
                    </div>
                <?php 
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='td'){
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
                }elseif($_SESSION['pesan']=='hd'){
                  ?>
                  <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> diskusi berhasil dihapus</h5>
                      
                  </div>
                <?php
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='hk'){
                ?>
                <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> komentar berhasil hapus</h5>
                    
                </div>
                <?php
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='ed'){
                  ?>
                  <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> diskusi berhasil diedit</h5>
                      
                  </div>
                <?php
                $_SESSION['pesan']='';
                }elseif($_SESSION['pesan']=='ek'){
                  ?>
                  <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> komentar berhasil diedit</h5>
                      
                  </div>
                  <?php
                  $_SESSION['pesan']='';
                  }
                ?>
              <!-- pesan -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Preview Materi</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Edit Materi</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Diskusi</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Presensi</a></li>
                  
                  <li class="pull-right"><a href="javascript:void(0);" id="<?php echo $_GET['id_materi'];?>" class="text-muted hapus-materi"><i class="fa fa-trash"></i></a></li>
                </ul>
                <div class="tab-content">
                <!-- panel preview materi -->
                  <div class="tab-pane active" id="tab_1">
                    <b>Preview Materi:</b>
                    <?php
                    $data_materi=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu left join guru on guru.id_guru=ampu.id_guru left join kelas on kelas.id_kelas=ampu.id_kelas left join mapel on mapel.id_mapel=ampu.id_mapel where materi.id_materi='$_GET[id_materi]'");
                    while($d = mysqli_fetch_array($data_materi)){   
                       $id_kelas=$d['id_kelas'];        
                    ?>
                    <table style="width:100%; ">
                      <tr>
                        <td>Nama Guru Pengajar</td>
                        <td> : <b><?php echo $d['nm_guru']?></b></td>
                        <td>Tanggal Posting</td>
                        <td> : <b><?php echo date("d-m-Y H:i:s",$d['time'])?></b></td>
                      </tr>
                      <tr>
                        <td>Mata Pelajaran</td>
                        <td> : <b><?php echo $d['nm_mapel']?></td>
                        <td>Tanggal Materi ditutup</td>
                        <td> : <b><?php echo date("d-m-Y H:i:s",$d['expired'])?></b></td>
                      </tr>
                      <tr>
                        <td>Kelas</td>
                        <td> : <b><?php echo $d['nm_kelas']?></td>
                        <td>Jenis Posting</td>
                        <td> : <b><?php if($d['jenis']=='1'){ echo "teks";}elseif($d['jenis']=='2'){ echo "file";}elseif($d['jenis']=='3'){ echo "link / youtube";}?></b></td>
                      </tr>
                      <tr>
                        <td>Jumlah Siswa</td>
                        <td> : <b> <?php echo mysqli_num_rows(mysqli_query($koneksi,"select * from siswa where id_kelas='$d[id_kelas]'")); ?></b></td>
                        <td>Siswa Sudah Melihat</td>
                        <td> : <b> <?php echo mysqli_num_rows(mysqli_query($koneksi,"select * from notif where id_materi='$d[id_materi]'")); ?></b></td>
                      </tr>
                    </table>
                    <!-- post text -->
                    <p style="margin-top:20px;"><b>Judul</b> : <br><?php echo $d['judul']?></p>
                    <p><b>Deskripsi</b> :<br> <?php echo $d['ket']?></p>

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
                    
                    <?php } ?>
                  </div>
                  <!-- /.edit materi -->
                  <div class="tab-pane" id="tab_2">
                    <div>
                    <?php
                    $data_materi=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu left join guru on guru.id_guru=ampu.id_guru left join kelas on kelas.id_kelas=ampu.id_kelas left join mapel on mapel.id_mapel=ampu.id_mapel where materi.id_materi='$_GET[id_materi]'");
                    while($d = mysqli_fetch_array($data_materi)){           
                    ?>
                      <form method="post" action="http://localhost/elearning/admin/?system=materi&aksi=edit_materi" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Judul Materi</label>
                              <input type="hidden" name="id_materi" value=<?php echo $d['id_materi'];?>>
                              <input type="text" class="form-control" name="judul" value="<?php echo $d['judul'];?>" placeholder="Masukkan Judul Materi" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Deskripsi Materi</label>
                              <textarea class="form-control" name="deskripsi"  placeholder="Masukkan Judul Deskripsi"required><?php echo $d['ket'];?></textarea>
                          </div>
                          <div class="form-group">
                          <label for="exampleInputPassword1">Jenis Materi</label>
                              <select class="form-control select2" name="jenis"style="width:100%; " id="jenis" required>
                                  <option > -- pilih --</option>
                                  <option value="1"  <?php if($d['jenis']=='1'){ echo 'selected';}?> >teks</option>
                                  <option value="2"  <?php if($d['jenis']=='2'){ echo 'selected';}?>>file</option>
                                  <option value="3"  <?php if($d['jenis']=='3'){ echo 'selected';}?>>link / youtube</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">File Upload</label>
                              <input type="hidden" name="nama_file" value=<?php echo $d['file'];?>>
                              <input type="file" class="form-control" name="file" placeholder="Masukkan Judul Materi" >
                              <span>abaikan file apabila hanya mengedit selain file</span>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Link</label>
                              <input type="text" class="form-control" name="link" value="<?php echo $d['link'];?>" placeholder="Masukkan Link" >
                              <span>referensi bisa berupa link google atau juga dari youtube</span>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Batas Akhir Akses Materi</label>
                              <input type="datetime-local" class="form-control" name="batas_akhir" value="<?php echo date('Y-m-d\TH:i:s',$d['time']);?>" placeholder="Masukkan Judul Materi" required>
                          </div>
                          <div class="form-group">
                          <label for="exampleInputPassword1">Status</label>
                              <select class="form-control select2" name="status" style="width:100%; " id="status" required>
                                  <option > -- pilih --</option>
                                  <option value="1" <?php if($d['sts']=='1'){ echo 'selected';}?>>posting</option>
                                  <!-- <option value="0">arsip</option> -->
                              </select>
                          </div>
                          <div class="text-left">
                              <button type="submit" class="btn btn-success">Simpan</button>
                          </div>
                      </form>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- /.diskusi -->
                  <div class="tab-pane" id="tab_3">
                    <b>Diskusi:</b>
                    <div class="text-right" style="padding-bottom:20px;">
                      <button data-toggle="modal" data-target="#tambah_diskusi" type="button" class="btn btn-primary "><i class="fa fa-group"></i> Tambah Diskusi</button>
                    </div>
                    <div>
                        <?php
                        $data=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu  left join guru on guru.id_guru=ampu.id_guru left join mapel on mapel.id_mapel=ampu.id_mapel where  materi.id_materi='$_GET[id_materi]'");
                        while($d = mysqli_fetch_array($data)){
                        $id_ampu=$d['id_ampu'];
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
                      <div class="">
                          <div class="box box-default collapsed-box">
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
                                  <div class="box-tools pull-right">
                                      <button type="button" class="btn btn-box-tool hapus-diskusi" id="<?php echo $disk['id_post'];?>"><i class="fa fa-trash"></i></button>
                                      <button type="button" class="btn btn-box-tool edit-diskusi" id="<?php echo $disk['id_post'];?>"><i class="fa fa-pencil"></i></button>
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
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
                                          <div>
                                            <a href="javascript:void(0)" id="<?php echo $reply['id_reply'];?>" class="label label-default btn-xs hapus-reply"><i class="fa fa-trash"></i> hapus</a> <a href="javascript:void(0)" id="<?php echo $reply['id_reply'];?>" class="label label-default btn-xs edit-komentar"><i class="fa fa-pencil"></i> edit</a>
                                          </div>
                                      </div>
                                      <!-- /.comment-text -->
                                  </div>
                                      <?php } ?>
                              </div>
                              <!-- /.box-footer -->
                              <div class="box-footer">
                                  <form action="http://localhost/elearning/admin/?system=materi&aksi=tambah_komentar&id_materi=<?php echo $_GET['id_materi']; ?>" method="post">
                                      <img class="img-responsive img-circle img-sm" src="../assets/dist/img/user4-128x128.jpg" alt="Alt Text">
                                      <!-- .img-push is used to add margin to elements next to floating images -->
                                      <div class="img-push">
                                      <input type="hidden" name="id_post" value="<?php echo $disk['id_post'];?>">
                                      <input type="hidden" name="id_ampu" value="<?php echo $d['id_ampu'];?>">
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
                  </div>
                  <!-- /.presensi -->
                  <!-- /.diskusi -->
                  <div class="tab-pane" id="tab_4">
                    <b>Presensi Materi:</b>
                    <!-- tabel presensi -->
                    <table class="table table-bordered ">
                      <thead>
                        <tr class="text-center">
                          <th class="text-center">Nama</th>
                          <th class="text-center">Kehadiran</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $data_siswa=mysqli_query($koneksi,"select * from siswa where id_kelas='$id_kelas'");
                      while($ds = mysqli_fetch_array($data_siswa)){
                      ?>
                        <tr>
                          <td><?php echo $ds['nm_siswa'];?></td>
                          <?php
                          $notif=mysqli_query($koneksi,"select * from notif where id_materi='$_GET[id_materi]' and id_siswa='$ds[id_siswa]'");
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
                          ?>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- modal tambah diskusi -->
<div class="modal fade" id="tambah_diskusi">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Diskusi</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=materi&aksi=tambah_diskusi">
        <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Diskusi</label>
                  <input type="hidden" name="id_ampu" value="<?php echo $id_ampu;?>">
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
        <form method="post" action="http://localhost/elearning/admin/?system=materi&aksi=edit_diskusi">
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
        <form method="post" action="http://localhost/elearning/admin/?system=materi&aksi=edit_komentar">
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
