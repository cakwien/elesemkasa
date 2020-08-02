

<div class="row">
<div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="img/user0.png" alt="User Image">
                <span class="username"><a href="#"> 
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
                            ?></a></span>
                <span class="description">Memulai Diskusi - <?php echo sejak($dis['wkt_post']); ?> </span>
              </div>
              <!-- /.user-block -->
              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p><?=$dis['isi']?></p>

              

              <!-- Attachment -->
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="img/materi0.png" alt="Attachment Image">

                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="?p=detail&id=<?=$dis['id_materi']?>"><?=$dis['judul']?> Kelas : <?=$dis['nm_kelas']?></a></h4>
                    <h6 class="attachment-heading text-muted"><?php echo sejak($dis['wkt_materi']);?></h6>

                  <div class="attachment-text">
                    <?=$dis['ket']?>
                  </div>
                    <br>
                    <div class="attachment-footer">
                    <?php if (!empty($dis['file'])){ ?>
                    <a href="upload/<?php echo $dis['file']; ?>" class="btn-sm btn-success"><i class="fa fa-download"></i> Download Materi</a>
                        
                    <?php
                                                   }
                      else { echo ""; }
                                                    
                            if(!empty($dis['link']))
                            {
                                echo '<a href="'.$dis['link'].'" class="btn-sm btn-warning"><i class="fa fa-link"></i> Link</a>';
                            }else
                            {
                                echo "";
                            }
                        ?>    
                       
                        
                    </div>
                  <!-- /.attachment-text -->
                </div>
                <!-- /.attachment-pushed -->
              </div>
              <!-- /.attachment-block -->

              <!-- 
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>-->
              <span class="pull-right text-muted"><?php echo $jml_reply['jml']; ?> Komentar</span>
            </div>
              
              
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
                        <span class="text-muted pull-right"><?php echo sejak($rp['time']);?></span>
                      </span><!-- /.username -->
                   <?=$rp['isi']?> 
                </div>
                <!-- /.comment-text -->
              </div> <?php } }?>
              <!-- /.box-comment -->
   
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
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
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>