<script type="text/javascript">
    $(".hapus-diskusi").click(function(){
        var id = $(this).attr('id');
        var materi="<?php echo $_GET['id_materi'];?>";
       swal({
        title: "apakah anda yakin ?",
        text: "menghapus diskusi ini",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "ya, hapus!",
        cancelButtonText: "tidak, batal menghapus!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: "http://localhost/elearning/siswa/?system=detail_tugas&aksi=hapus_diskusi",
             data:{id : id},
             type: 'GET',
             error: function() {
                alert('maaf penghapusan data dibatalkan');
             },
             success: function(data) {
                  swal("Berhasil!", "data berhasil dihapus.", "success");
                  location.href="http://localhost/elearning/siswa/?page=detail_tugas&id_materi="+materi;
                  // tampil_data_kelas();
             }
          });
        } else {
          swal("gagal", "gagal penghapusan data :)", "error");
        }
      });
     
    });
    
</script>

<script type="text/javascript">
    $(".hapus-reply").click(function(){
        var id = $(this).attr('id');
        var materi="<?php echo $_GET['id_materi'];?>";
       swal({
        title: "apakah anda yakin ?",
        text: "menghapus komentar ini",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "ya, hapus!",
        cancelButtonText: "tidak, batal menghapus!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: "http://localhost/elearning/siswa/?system=detail_tugas&aksi=hapus_komentar",
             data:{id : id},
             type: 'GET',
             error: function() {
                alert('maaf penghapusan data dibatalkan');
             },
             success: function(data) {
                  swal("Berhasil!", "data berhasil dihapus.", "success");
                  location.href="http://localhost/elearning/siswa/?page=detail_tugas&id_materi="+materi;
                  // tampil_data_kelas();
             }
          });
        } else {
          swal("gagal", "gagal penghapusan data :)", "error");
        }
      });
     
    });
    
</script>

<script type="text/javascript">
  // load data for edit
    $(document).ready(function() {
        $('.edit-diskusi').click(function(){
            var id = $(this).attr('id');
            $.ajax({
                url : "http://localhost/elearning/siswa/?system=detail_tugas&aksi=select_diskusi",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#id_diskusi_edit').val(response[i].id_post);
                    $('#desk_diskusi').val(response[i].isi); 
                    $('#nm_pendiskusi').val(response[i].nama_user); 
                    $('#tipe_pendiskusi').val(response[i].tipe); 
                    $('#edit_diskusi').modal({backdrop: 'static', keyboard: true, show: true});
                });
            }
            });
        });
    });
</script>

<script type="text/javascript">
  // load data for edit
    $(document).ready(function() {
        $('.edit-komentar').click(function(){
            var id = $(this).attr('id');
            $.ajax({
                url : "http://localhost/elearning/siswa/?system=detail_tugas&aksi=select_komentar",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#id_komentar_edit').val(response[i].id_reply);
                    $('#desk_pengomentar').val(response[i].isi); 
                    $('#nm_pengomentar').val(response[i].nama_user); 
                    $('#tipe_pengomentar').val(response[i].tipe); 
                    $('#edit_komentar').modal({backdrop: 'static', keyboard: true, show: true});
                });
            }
            });
        });
    });
</script>