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
                            <input type="hidden" name="update" value="<?=$id_materi?>">
                            <input type="text" name="judul" class="form-control" placeholder="Judul Materi..." required value="<?=$judul?>">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Materi :</label>
                            <textarea name="ket" class="form-control" rows="3" placeholder="Tambah Deskripsi Materi..."><?=$ket?></textarea>
                        </div>
                      
                        <div class="form-group">
                            <label>Upload File : <?php if(!empty($file)) {echo '<a class="btn-xs btn-danger">'.$file.'</a>';} else {echo"";} ?></label>
                            <input type="hidden" name="berkaslawas" value="<?=$file?>">
                            <input type="file" name="berkas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link :</label>
                            <input type="text" name="link" class="form-control" placeholder="Tautan Refrensi..." value="<?=$link?>">
                        </div>
                        <div class="form-group">
                            <label>Batas Akhir Materi : <?php if(!empty($expired)){  echo '<span class="btn-sm btn-danger">'.date('d/m/Y H.i',$expired).'</span>'; }else { echo "";}?></label>
                            <input type="text" name="expired2" class="form-control" value="<?=$expired?>" required>
                            <input type="datetime-local" name="expired" class="form-control" value="<?=date('d/m/Y H.i',$expired)?>" >
                        </div>
                        <div class="form-group">
                            <label>Status Materi :</label>
                        
                            <div class="radio">
                                <label>
                                <input type="radio" name="status" id="optionsRadios1" value="1" <?php if($sts == 1){ echo "checked=checked";}else{ echo "";}  ?>required>
                                    Publikasi
                                </label>
                            </div> 
                            <div class="radio">
                                <label>
                                <input type="radio" name="status" id="optionsRadios1" value="0" <?php if($sts == 0){ echo "checked=checked";}else{ echo "";}  ?> required>
                                    Arsip 
                                </label>
                            </div> 
                        </div>
                        <?php if(!empty($id_materi))
                            {
                                echo '<input type="submit" name="up" value="Update Materi" class="btn btn-primary pull-right">';
                            }
                                else { echo '<input type="submit" name="simpan" value="Update Materi" class="btn btn-primary pull-right">';}
                            ?>
                        
                        <a class="btn btn-danger" href="?p=mapel&id_ampu=<?php echo $_GET['id_ampu']; ?>"><i class="fa fa-arrow-circle-left"></i> <b>Kembali</b></a>
                    </div>
                </form>
            <!-- /.box-body -->
          </div>
    </div>

</div>