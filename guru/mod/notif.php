<?php
class notif
{
    function bukamateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select * from notif join materi on notif.id_materi = materi.id_materi join siswa on notif.id_siswa = siswa.id_siswa where id_materi = '$id_materi'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function jml_lihatmateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select count(id_siswa) as jumlah from notif  where id_materi = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
}
?>