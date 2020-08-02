<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?php $mapel=explode(". ",$mp['nm_mapel']); echo $mapel[1]; ?></h3>
              <p class="text-muted text-center"><?=$mp['nm_guru'] ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Kelas : </b><b class="btn-sm btn-danger"><?php echo $mp['nm_kelas'] ?></b>
                </li>
                <li class="list-group-item">
                  <b>Jumlah Materi : </b><b class="btn-sm btn-danger"><?= $jm['jumlah_materi'] ?></b>
                </li>
              </ul>

              <a href="?p=materi&id_ampu=<?php echo $mp['id_ampu']; ?>" class="btn btn-primary pull-right"><b>Tambah Materi</b></a>
            </div>
            <!-- /.box-body -->
          </div>
    </div>

    <!-- DAFTAR MATERI -->
    <div class="col-xs-12">
        
        <?php 
        $dt=$materi->tampilall($con,$id_ampu);
        foreach ($dt as $mt)
        {
        ?>
        
        <div class="box box-solid">
            <div class="box-header with-border">
                <b><?php echo sejak($mt['time']); ?></b>
                    <div class="dropdown pull-right">
                        <a href="#" class="btn-sm btn-danger dropdown-toggle" data-toggle="dropdown"><span class="fa fa-caret-square-o-down"></span> Opsi</a>
                        <ul class="dropdown-menu">
                             <?php $cek=$materi->cekpost($con,$mt['id_materi']); if($cek['jml']<1){ ?>
                            <li role="presentation"><a role="menuitem"  href="?p=post&id=<?php echo $mt['id_materi'];?>"><i class="fa fa-commenting"></i>Buat Diskusi</a></li>
                            <?php } ?>
                            <li role="presentation"><a role="menuitem"  href="#"><i class="fa fa-pencil"></i>Edit Materi</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="?p=mapel&id_ampu=<?=$mt['id_ampu']?>&hapus=<?=$mt['id_materi']?>"><i class="fa fa-trash"></i>Hapus Materi</a></li>
                        </ul>
                    </div>
            </div>
            <div class="box-body">
                <h4><a href="?p=detail&id=<?=$mt['id_materi']?>" class="linkhitam"><?=$mt['judul']?></a> 
                    
                </h4> 
            </div>
            <div class="box-footer">
               <?php $cek=$materi->cekpost($con,$mt['id_materi']); if($cek['jml']>0){ ?>
                <a href="?p=diskusi&id_materi=<?=$mt['id_materi']?>" class="btn-sm btn-danger"><i class="fa fa-comments-o"></i> <?php $dt=$materi->jmlreply($con,$mt['id_materi']); echo $dt['jml'] + 1;?></a> 
                <?php } ?>
                <a class="btn-sm btn-warning"><i class="fa fa-eye"></i>  <?php $ntf=$notif->jml_lihatmateri($con,$mt['id_materi']); echo $ntf['jumlah']; ?></a> 
                <?php
                if ($mt['sts'] == "0")
                {   ?>
                <a href="?p=mapel&id_ampu=<?php echo $_GET['id_ampu']; ?>&pub=<?php echo $mt['id_materi']; ?>" class="btn-sm btn-default" title="Klik tombol ini untuk mempublikasikan materi ini"><i class="fa fa-archive"></i> Arsip</a>
                <?php } else { ?>
                <a href="?p=mapel&id_ampu=<?php echo $_GET['id_ampu']; ?>&ar=<?php echo $mt['id_materi']; ?>" class="btn-sm btn-primary" title="Klik tombol ini untuk mengarsipkan materi"><i class="fa fa-globe"></i> Published</a>
                <?php } ?>
                    
            </div>
        </div>
        
        <?php } ?>
        
    </div>
    <!-- DAFTAR MATERI -->
</div>


