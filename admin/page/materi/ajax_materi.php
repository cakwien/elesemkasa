<script>
$(document).ready(function(){
    $('#kelas').on('change', function(){
        var id = $(this).val();
        if(id){
            $.ajax({
                type:'POST',
                url:'http://localhost/elearning/admin/?system=materi&aksi=select_ampu',
                data:'id='+id,
                success:function(html){
                    $('#pengampu').html(html);
                    
                }
            }); 
        }else{
            $('#pengampu').html('<option value="">-- pilih --</option>');
            
        }
    });
});
</script>

<script type="text/javascript">
    $(".hapus-materi").click(function(){
        var id = $(this).attr('id');

       swal({
        title: "apakah anda yakin ?",
        text: "menghapus data ini",
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
             url: "http://localhost/elearning/admin/?system=materi&aksi=hapus_materi",
             data:{id : id},
             type: 'GET',
             error: function() {
                alert('maaf penghapusan data dibatalkan');
             },
             success: function(data) {
                  swal("Berhasil!", "data berhasil dihapus.", "success");
                  location.href="http://localhost/elearning/admin/?page=materi&materi=data_sekarang";
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
             url: "http://localhost/elearning/admin/?system=materi&aksi=hapus_diskusi",
             data:{id : id},
             type: 'GET',
             error: function() {
                alert('maaf penghapusan data dibatalkan');
             },
             success: function(data) {
                  swal("Berhasil!", "data berhasil dihapus.", "success");
                  location.href="http://localhost/elearning/admin/?page=materi&materi=detail_materi&id_materi="+materi;
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
             url: "http://localhost/elearning/admin/?system=materi&aksi=hapus_komentar",
             data:{id : id},
             type: 'GET',
             error: function() {
                alert('maaf penghapusan data dibatalkan');
             },
             success: function(data) {
                  swal("Berhasil!", "data berhasil dihapus.", "success");
                  location.href="http://localhost/elearning/admin/?page=materi&materi=detail_materi&id_materi="+materi;
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
                url : "http://localhost/elearning/admin/?system=materi&aksi=select_diskusi",
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
                url : "http://localhost/elearning/admin/?system=materi&aksi=select_komentar",
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

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>