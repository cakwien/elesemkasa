<script>
// $(document).ready(function(){
// tampil_data_siswa();

// $('#example1').dataTable();

// function tampil_data_siswa(){
//   $.ajax({
//       type  : 'ajax',
//       url   : 'http://localhost/elearning/admin/?system=siswa&aksi=data_siswa',
//       async : false,
//       dataType : 'json',
//       success : function(data){
//           var html = '';
//           var i;
//           for(i=0; i<data.length; i++){
//               html += '<tr id="'+data[i].id_siswa+'">'+
//                       '<td>'+i+'</td>'+
//                       '<td>'+data[i].nama_siswa+'</td>'+
//                       '<td>'+data[i].tingkat+'</td>'+
//                       '<td>'+data[i].nama_guru+'</td>'+
//                       '<td>'+
//                       "<button relid="+data[i].id_siswa+" class='btn btn-xs btn-warning edit_data'>edit</button>"+
//                       "<button nama_delete="+data[i].nama_siswa+" class='btn btn-xs btn-danger remove'>hapus</button>"+
//                       '</td>'+
//                       '</tr>';
//           }
//           $('#show_data').html(html);
//       }

//   });

// }

// });
</script>

<script type="text/javascript">
// load data for edit
    $(document).ready(function() {
        $('.edit_data').click(function(){
            var id = $(this).attr('relid'); //get the attribute value
            $.ajax({
                url : "http://localhost/elearning/admin/?system=siswa&aksi=select_data_siswa",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#id').val(response[i].id_siswa);
                    $('#nama_siswa').val(response[i].nama_siswa); 
                    $('#id_kelas').val(response[i].id_kelas); 
                    $('#username').val(response[i].username); 
                    $('#password').val(response[i].password); 
                    $('#id_kelas').select2().trigger('change');
                    // $('#mySelect2').select2('data', {id: response[i].id_guru, text: response[i].nama_guru});
                    // $('#mySelect2').find(':selected').data(response[i].id_guru);
                    $('#editdata').modal({backdrop: 'static', keyboard: true, show: true});
                });
            }
            });
        });
    });
</script>

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        var nama = $(this).attr('nama_delete');

       swal({
        title: "apakah anda yakin ?",
        text: "menghapus data "+ nama,
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
             url: "http://localhost/elearning/admin/?system=siswa&aksi=hapus_siswa",
             data:{id : id},
             type: 'GET',
             error: function() {
                alert('maaf penghapusan data dibatalkan');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Berhasil!", "data berhasil dihapus.", "success");
                  // tampil_data_siswa();
             }
          });
        } else {
          swal("gagal", "gagal penghapusan data :)", "error");
        }
      });
     
    });
    
</script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
