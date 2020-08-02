<div class="row">
        <div class="col-md-5">
            <div class="box box-danger">
                     <div class="box-header with-border">
                          <h3 class="box-title">DETAIL MATERI</h3>
                     </div>
                 <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> <?=$det['nm_mapel']?></strong>

              <p class="text-muted">
                <?=$det['judul']?>
              </p>

              <hr>
              <strong><i class="fa fa-commenting margin-r-5"></i> Kelas</strong>

              <p class="text-muted"><?=$det['nm_kelas']?></p>

              <hr>

              <strong><i class="fa fa-commenting margin-r-5"></i> Penjelasan</strong>

              <p class="text-muted"><?=$det['ket']?></p>

              <hr>

              <strong><i class="fa fa-file-o margin-r-5"></i> Lampiran</strong>

              <p>
                <a class="btn-xs btn-primary" href="https://<?=$det['link']?>" ><i class="fa fa-link"></i> Link</a>
                <a class="btn-xs btn-success" href="#"><i class="fa fa-file"></i> Lampiran Dokumen</a>
              </p>

              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i> Deadline</strong>
                     <p>Dibuat pada tanggal : <br>
                         
                         <span class="label label-success"><?php $tgl=date('Y-m-d',$det['time']); echo tglindo($tgl) ," | ", date('H:i',$det['time'])?> WIB</span>
                             </p>  
                     
                     <p>Deadline pada tanggal : <br>
                         
                        <span class="label label-danger"><?php $tgl=date('Y-m-d',$det['expired']); echo tglindo($tgl) ," | ", date('H:i',$det['expired'])?> WIB</span>
            <!-- /.box-body -->
          </div>
            </div></div>
            
            
    <div class="col-md-7">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4>PRESENSI MATERI SISWA</h4>
               <a href="" class="btn-sm btn-primary"><i class="fa fa-file-excel-o"></i> Download Presensi</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Time Stamp</th>
                        </tr>
                        <!-- Data Absensi LOOP -->
                        <?php
                            $id_kelas=$det['id_kelas'];
                            $dt=$presensi->tpsiswa($con,$id_kelas);
                            $no=1;    
                            foreach ($dt as $pre)
                            {
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$pre['nisn']?></td>
                            <td><?=strtoupper($pre['nm_siswa'])?></td>
                            <td><?php $tp=$presensi->tptime($con,$pre['id_siswa'],$_GET['id']); if(empty($tp['time'])){ ?> <span class="btn-xs btn-danger">Belum</span> <?php }else{ echo sejak($tp['time']);}?></td>
                        </tr>
                        <?php $no++; } ?>
                        <!-- Data Absensi LOOP -->
                    </tbody>
                </table>
            </div>
        </div>        
    </div>        
</div>
