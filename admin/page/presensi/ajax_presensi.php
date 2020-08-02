<script>
$(document).ready(function(){
  $('.lihat_detail').click(function(){
        // var id = $(this).val();
        var id = $(this).attr('relid');
        if(id){
            $.ajax({
                type:'POST',
                url:'http://localhost/elearning/admin/?system=presensi&aksi=lihat_detail',
                data:'id='+id,
                success:function(html){
                    $('#detail_materi').html(html);
                    $('#detail').modal({backdrop: 'static', keyboard: true, show: true});
                }
            }); 
        }else{
            // $('#detail_materi').html('');
            
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

