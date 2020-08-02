<script>
// $(document).ready(function(){
// tampil_data_mapel();

// $('#example1').dataTable();

// function tampil_data_mapel(){
//   $.ajax({
//       type  : 'ajax',
//       url   : 'http://localhost/elearning/admin/?system=mapel&aksi=data_mapel',
//       async : false,
//       dataType : 'json',
//       success : function(data){
//           var html = '';
//           var i;
//           for(i=0; i<data.length; i++){
//               html += '<tr id="'+data[i].id_mapel+'">'+
//                       '<td>'+i+'</td>'+
//                       '<td>'+data[i].nama_mapel+'</td>'+
//                       '<td>'+data[i].tingkat+'</td>'+
//                       '<td>'+data[i].nama_mapel+'</td>'+
//                       '<td>'+
//                       "<button relid="+data[i].id_mapel+" class='btn btn-xs btn-warning edit_data'>edit</button>"+
//                       "<button nama_delete="+data[i].nama_mapel+" class='btn btn-xs btn-danger remove'>hapus</button>"+
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
                url : "http://localhost/elearning/admin/?system=mata_pelajaran&aksi=select_data_mata_pelajaran",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#id').val(response[i].id_mapel);
                    $('#nama_mapel').val(response[i].nama_mapel); 
                    $('#tingkat').val(response[i].tingkat); 
                    // $('#mySelect2').select2('data', {id: response[i].id_mapel, text: response[i].nama_mapel});
                    // $('#mySelect2').find(':selected').data(response[i].id_mapel);
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
             url: "http://localhost/elearning/admin/?system=mata_pelajaran&aksi=hapus_mata_pelajaran",
             data:{id : id},
             type: 'GET',
             error: function() {
                alert('maaf penghapusan data dibatalkan');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Berhasil!", "data berhasil dihapus.", "success");
                  // tampil_data_mapel();
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
