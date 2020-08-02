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
        <li class="active">Data Materi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- data mapel -->
            <div class="col-md-12 ">
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
                }elseif($_SESSION['pesan']=='bh'){
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
                    <h3 class="box-title">Data Materi</h3>
                    <div class="box-tools">
                        <!-- <a href="?page=materi&materi=tambah_materi" class="btn btn-success">TAMBAH DATA</a> -->
                    </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Nama Guru</th>
                                <th>Kelas</th>
                                <th>Judul Tugas</th>
                                <th>Tanggal Upload</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                $data_materi=mysqli_query($koneksi,"select * from materi left join ampu on ampu.id_ampu=materi.id_ampu left join guru on guru.id_guru=ampu.id_guru left join kelas on kelas.id_kelas=ampu.id_kelas left join mapel on mapel.id_mapel=ampu.id_mapel order by materi.id_materi desc");
                                while($d = mysqli_fetch_array($data_materi)){
                            ?>
                            <tr id="<?php echo $d['id_materi'];?>">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nm_mapel']?></td>
                                <td><?php echo $d['nm_guru']?></td>
                                <td><?php echo $d['nm_kelas']?></td>
                                <td><?php echo $d['judul']?></td>
                                <td><?php echo date('d-m-Y H:i',$d['time']);?></td>
                                <td>
                                    <a href="?page=materi&materi=detail_materi&id_materi=<?php echo $d['id_materi'];?>"  class="btn btn-xs btn-primary edit_data">lihat data</a>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Nama Guru</th>
                                <th>Kelas</th>
                                <th>Judul Tugas</th>
                                <th>Tanggal Upload</th>
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


<!-- modal lihat detail materi upload -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Materi</h4>
        </div>
        <form method="post" action="http://localhost/elearning/admin/?system=materi&aksi=upload_materi" enctype="multipart/form-data">
        <div class="modal-body">
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
                <select class="form-control select2" name="jenis" id="jenis" style="width:100%; " required>
                    <option > -- pilih --</option>
                    <option value="1">materi</option>
                    <option value="2">tugas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">File Upload</label>
                <input type="file" class="form-control" name="file" placeholder="Masukkan Judul Materi" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Batas Akhir Akses Materi</label>
                <input type="datetime-local" class="form-control" name="batas_akhir" placeholder="Masukkan Judul Materi" required>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
                <select class="form-control select2" name="status" id="status" style="width:100%;" required>
                    <option > -- pilih --</option>
                    <option value="1">posting</option>
                    <!-- <option value="0">arsip</option> -->
                </select>
            </div>
              <!-- /.box-body -->
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success pull-right">Simpan</button>
            <button type="button" data-backdrop="static" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal lihat detail materi upload -->



