<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
               <h4>Ganti Password</h4>
            </div>
            <form action="" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label>Password Lama :</label>
                    <input class="form-control" type="password" name="pwlama" placeholder="Password Lama">
                    <input class="form-control" type="hidden" name="id_guru" value="<?=$aktif['id_guru']?>" placeholder="Password Lama">
                </div>
                <div class="form-group">
                    <label>Password Baru :</label>
                    <input class="form-control" type="password" name="pwbaru" placeholder="Password Baru">
                </div>
                <button class="btn btn-danger pull-right"><i class="fa fa-save"></i> Ganti Password</button>
            </div>
                </form>
        </div>
    </div>
</div>