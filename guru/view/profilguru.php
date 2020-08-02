<div class="row">
    <div class="col-md-8">
        <form action="" method="post">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="img/user0.png" alt="User Image">
                <span class="username">Nama Guru : <?php echo $aktif['nm_guru']; ?></span>
                 <span class="description">Kode Guru : <?php echo $aktif['kd_guru']; ?></span><br>
                  <div class="box-footer">
                    <a href="?p=gantipw" class="btn-sm btn-warning pull-right"><i class="fa fa-key"></i> Ganti Password</a>
                  </div>
                  
                  
                   <div class="box box-info">
            <div class="box-header with-border">
                <div class="box-title">Mata Pelajaran yang di ampu :</div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Jenis</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                        </tr>
                        <!-- Data Absensi LOOP -->
                        <?php 
                        $id_guru = $aktif['id_guru'];
                        $ampu=$guru->tpampu($con,$id_guru);
                        $no=1;
                        foreach($ampu as $isi)
                        {
                            $jenis=explode(". ",$isi['nm_mapel']);
                        ?>
                        
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$jenis[0]?></td>
                            <td><?=$jenis[1]?></td>
                            <td><?=$isi['nm_kelas']?></td>
                        </tr>
                        <?php $no++; } ?>
                        <!-- Data Absensi LOOP -->
                    </tbody>
                </table>
            </div>
        </div>        
                  
              </div>
               
              </div>
        </div></form>
    </div>
</div>