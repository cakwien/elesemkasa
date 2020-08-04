

<div class="row">
    <?php
    $id_materi=$_GET['id_materi'];
    $j=$diskusi->tampildiskusi($con,$id_materi);
    foreach($j as $jd)
    {
    
    ?>
<div class="col-md-8">
          <!-- Box Comment -->
          <div class="box box-widget box-primary">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="img/user0.png" alt="User Image">
                <span class="username"><a href="#"> 
                    
                    <?php 
                    $tipe=$jd['tipe'];
                    $id_user = $jd['id_user'];
                    $nama=$diskusi->nmdiskusi($con,$tipe,$id_user);
                    echo $nama[0];
                    ?>
                    
                            </a></span>
                <span class="description">Memulai Diskusi - <?php echo sejak($jd['wkt_post']); ?> </span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="btn btn-box-tool" data-toogle="tooltip" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p><?=$jd['isi']?></p>
                
              

              <!-- Attachment -->
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="img/materi0.png" alt="Attachment Image">

                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="?p=detail&id=<?=$jd['id_materi']?>"><?=$jd['judul']?> Kelas : <?=$jd['nm_kelas']?></a></h4>
                    <h6 class="attachment-heading text-muted"><?php echo sejak($jd['wkt_materi']);?></h6>

                  <div class="attachment-text">
                    <?=$jd['ket']?>
                  </div>
                    <br>
                    <div class="attachment-footer">
                    <?php if (!empty($jd['file'])){ ?>
                    <a href="upload/<?php echo $dis['file']; ?>" class="btn-sm btn-success"><i class="fa fa-download"></i> <?php echo $dis['file']; ?></a>
                        
                    <?php
                                                   }
                      else { echo ""; }
                                                    
                            if(!empty($jd['link']))
                            {
                                echo '<a href="'.$jd['link'].'" class="btn-sm btn-warning"><i class="fa fa-link"></i> Link</a>';
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
              <span class="pull-right text-muted"><?php $jum=$diskusi->hitungreply($con,$jd['id_post']); echo $jum[0]; ?> Komentar</span>
            </div>
              
              
            <!-- /.box-body -->
            <div class="box-footer box-comments">
                <?php 
                    $id_post=$jd['id_post'];
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
                            $id_user=$rp['id_user']; 
                            $tipe=$rp['tipe'];
                            $nm=$diskusi->nmdiskusi($con,$tipe,$id_user);
                            echo $nm[0];
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
                    <input name="id_post" type="hidden" value="<?php echo $jd['id_post']; ?>">
                  <input type="text" class="form-control input-sm" name="reply" placeholder="Press enter to post comment">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div><?php } ?>
        <!-- /.col -->
      </div>