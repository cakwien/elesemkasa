<div class="row">
    <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget collapse-box">
            <div class="box-header with-border">
                
                <div class="attachment-block clearfix">
                <img class="attachment-img" src="img/materi0.png" alt="Attachment Image">

                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="?=detail&id=<?php echo $dis['id_materi']?>"><?=$dis['judul']?></a></h4>
                    <span class="description"><?php $tgl=date('Y-m-d',$dis['wkt_materi']); echo tglindo($tgl) ," | ", date('H:i',$dis['wkt_materi'])?> WIB</span>

                  <div class="attachment-text">
                    <?=$dis['ket']?>
                  </div>
                    <div class="btn-xs bg-red pull-left"><?=$dis['nm_kelas']?></div>
                  <!-- /.attachment-text -->
                </div>
                <!-- /.attachment-pushed -->
              </div>
                
              <div class="user-block">
                <img class="img-circle" src="img/user0.png" alt="User Image">
                <span class="username">
                    
                            <?php 
                                if ($dis['tipe'] == "0")
                                {
                                    $d=$diskusi->gururp($con,$dis['id_user']);
                                    echo $d['nm_guru'];
                                }else
                                {
                                    $d=$diskusi->siswarp($con,$dis['id_user']);
                                    echo $d['nm_siswa'];
                                }
                            ?>
                    
                  </span>
                  <span class="description"><?php $tgl=date('Y-m-d',$dis['wkt_post']); echo tglindo($tgl) ," | ", date('H:i',$dis['wkt_post'])?> WIB </span>
                  
                  
                   <h5><?=$dis['isi']?></h5>
                  
              </div>
                
                <span class="text-muted pull-right"> <?php echo $jml_reply['jml']; ?> Komentar </span>
              <!-- /.user-block -->
             
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
            <div class="box-footer box-comments">
                <?php 
                    $id_post=$dis['id_post'];
                    $dt=$diskusi->tpreply($con,$id_post);
                    if (empty($dt))
                    {
                        echo "";
                    }
                    else
                    {
                    foreach($dt as $rp)
                    {
                ?>
                <!--LOOPING KOMENTAR-->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="img/user0.png" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        <?php 
                                 
                            if ($rp['tipe'] == "0")
                            {
                                $d=$diskusi->gururp($con,$rp['id_user']);
                                echo $d['nm_guru'];
                            }else
                            {
                                $d=$diskusi->siswarp($con,$rp['id_user']);
                                echo $d['nm_siswa'];
                            }
                            
                         
                          ?>
                        <span class="text-muted pull-right"><?php $tgl=date('Y-m-d',$rp['time']); echo tglindo($tgl) ," | ", date('H:i',$rp['time'])?> WIB</span>
                      </span><!-- /.username -->
                  <?=$rp['isi']?> 
                </div>
                <!-- /.comment-text -->
              </div>
                <!--/LOOPING KOMENTAR-->
             <?php } }?>
            </div>
               <div class="box-footer">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="img/user0.png" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input type="hidden" name="id_user" value="<?php echo $aktif['id_guru']; ?>">
                  <input type="text" class="form-control input-sm" name="reply" placeholder="Press enter to post comment">
                </div>
              </form>
            </div>
</div>
    </div>
</div>
