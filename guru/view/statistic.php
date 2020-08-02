<div class="row">
    
    <?php
     $id_guru = $aktif['id_guru'];
     $ampu = $mapel->tampilampu($con,$id_guru);
    if (empty($ampu[0]))
    {
       
        ?>
    
  <div class="content">
    <div class="heading">
      <center><img src="img/sorry0.png" width="100"></center>
      </div>
      <div class="body">
      <center><h3><b>Mohon Maaf...</b></h3></center>
         
         <center><h4>Tidak ada Mata Pelajaran yang di Ampu. Bila terjadi kesalahan, silahkan menghubungi Admin</h4></center>
        
      </div>
      
    
    </div>
    
    
        <?php       
    }
    
    else
    {
    foreach ($ampu as $dt)
    {
        if($dt['tingkat'] == "1")
        {
            $bg="green";
        }else if ($dt['tingkat'] == "2")
        {
            $bg="aqua";
        }else
        {
            $bg="red";
        }
        
        $jmlmat=$materi->jmlmateri($con,$dt['id_ampu']);
    ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a class="linkhitam" href="?p=mapel&id_ampu=<?php echo $dt['id_ampu']; ?>">
            <div class="info-box">
            <span class="info-box-icon bg-<?php echo $bg; ?>"><i class="fa fa-book"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><b><?php $mapel=explode(". ",$dt['nm_mapel']); echo $mapel[1]; ?></b></span>
              <span class="info-box-text"><?php echo $dt['nm_kelas']; ?></span><br>
              <span title="Jumlah Materi" class="btn-xs btn-success pull-left"><i class="fa fa-tasks"></i> <?=$jmlmat['jumlah_materi']?></span>  
              
                <?php 
                  $jum=$diskusi->jmlpercakapan($con,$dt['id_ampu']);
                    if ($jum['jml'] > 0)
                    {
                        echo '<span title="Jumlah Percakapan Diskusi" class="btn-xs btn-danger pull-right"><i class="fa fa-commenting"></i>'.$jum['jml'].'</span> ';
                    }else
                    {
                        echo "";
                    }
                                          ?>
                
                
                  </div>
            <!-- /.info-box-content -->
              </div></a>
          <!-- /.info-box -->
        </div>
    <?php }
    
    } ?>
    
</div>

