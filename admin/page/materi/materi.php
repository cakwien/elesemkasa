  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mata Pelajaran
        <small>Matematika Dasar Kelas 10</small>
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
                }elseif($_SESSION['pesan']=='bh'){
                ?>
                    <div class="alert alert-success alert-dismissible"  style="padding-top:10px; padding-bottom:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> <b>Berhasil!</b> data berhasil dihapus</h5>
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
                } 
                ?>
            </div>
            <!-- list tugas -->
            <div class="col-md-8 col-md-offset-2 ">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="pull-left">
                            <div class="user-block">
                                <img class="img-circle" src="../assets/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><a href="#">Upload Materi Guru  </a></span>
                                <span class="description">( helper portal guru )</span>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="http://localhost/elearning/admin/?system=materi&aksi=upload_materi" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kelas</label>
                                <select class="form-control select2" name="kelas" id="kelas" style="width: 100%;" required>
                                    <option>-- pilih --</option>
                                    <?php
                                    $no=1;
                                        $kelas=mysqli_query($koneksi,"select * from kelas");
                                        while($w = mysqli_fetch_array($kelas)){
                                    ?>
                                    <option value="<?php echo $w['id_kelas'];?>"><?php echo $w['nm_kelas'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pengampu Mapel</label>
                                <select class="form-control select2" name="pengampu" id="pengampu" style="width: 100%;" required>
                                    
                                    <option>-- pilih --</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Materi</label>
                                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Materi" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi Materi</label>
                                <textarea class="form-control" name="deskripsi" placeholder="Masukkan Judul Deskripsi"required></textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Materi</label>
                                <select class="form-control select2" name="jenis" id="jenis" required>
                                    <option > -- pilih --</option>
                                    <option value="1">teks</option>
                                    <option value="2">file</option>
                                    <option value="3">link / youtube</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">File Upload</label>
                                <input type="file" class="form-control" name="file" placeholder="Masukkan Judul Materi" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Link</label>
                              <input type="text" class="form-control" name="link" placeholder="Masukkan Link" >
                              <span>referensi bisa berupa link google atau juga dari youtube</span>
                          </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Batas Akhir Akses Materi</label>
                                <input type="datetime-local" class="form-control" name="batas_akhir" placeholder="Masukkan Judul Materi" required>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                                <select class="form-control select2" name="status" id="status" required>
                                    <option > -- pilih --</option>
                                    <option value="1">posting</option>
                                    <!-- <option value="0">arsip</option> -->
                                </select>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->







