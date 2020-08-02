<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>
              <h3 class="box-title"> <?=$mp['nm_mapel']," (", $mp['nm_kelas'],")" ?> </h3>
            </div>
            <!-- /.box-header -->
                <form  action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Judul Materi :</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul Materi..." required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Materi :</label>
                            <textarea name="ket" class="form-control" rows="3" placeholder="Tambah Deskripsi Materi..."></textarea>
                        </div>
                      
                        <div class="form-group">
                            <label>Upload File :</label>
                            <input type="file" name="berkas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link :</label>
                            <input type="text" name="link" class="form-control" placeholder="Tautan Refrensi..." value="https://">
                        </div>
                        <div class="form-group">
                            <label>Batas Akhir Materi :</label>
                            <input type="datetime-local" name="expired" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status Materi :</label>
                            <div class="radio">
                                <label>
                                <input type="radio" name="status" id="optionsRadios1" value="1" required>
                                    Publikasi
                                </label>
                            </div> 
                            <div class="radio">
                                <label>
                                <input type="radio" name="status" id="optionsRadios1" value="0" required>
                                    Arsip
                                </label>
                            </div> 
                        </div>
                        
                       
                        <button class="btn btn-success pull-right"><i class="fa fa-save"> </i> <b>Tambah Materi</b></button>
                    </div>
                </form>
            <!-- /.box-body -->
          </div>
    </div>

</div>