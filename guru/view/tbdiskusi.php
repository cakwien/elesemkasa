<div class="row">
    <div class="col-md-8">
        <form action="" method="post">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="img/user0.png" alt="User Image">
                <span class="username">Posting diskusi sebagai : <?php echo $mt['nm_guru']; ?></span>
                 <span class="description">Kode Guru : <?php echo $mt['kd_guru']; ?></span><br>
                  <div class="attachment-block clearfix">
                      
                        <h4 class="attachment-heading"><?php echo $mt['judul'];  ?></h4>
                          <div class="attachment-text">
                          <p><?php echo $mt['ket']; ?></p>
                           <p><b class="btn-sm btn-danger btn-flat"><?php echo $mt['nm_kelas']; ?></b></p>
                          </div>
                     
                  </div>
              </div>
               
                   <textarea class="form-control" name="isi" placeholder="Tambahkan percakapan diskusi..."></textarea><br>
                    <input type="submit" name="posting" class="btn btn-primary pull-right" value="Kirim">
                
                
              </div>
        </div></form>
    </div>
</div>