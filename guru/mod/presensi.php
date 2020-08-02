<?php
class presensi
{
    function presensibymateri($con,$id_materi)
    {
        $list=array();
        $q=mysqli_query($con,"select siswa.nisn, siswa.nm_siswa, notif.time from notif join materi on notif.id_materi = materi.id_materi join siswa on notif.id_siswa = siswa.id_siswa where notif.id_materi = '$id_materi'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function tpsiswa($con,$id_kelas)
    {
        $list=array();
        $q=mysqli_query($con,"select * from siswa where id_kelas = '$id_kelas'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function tptime($con,$id_siswa,$id_materi)
    {
        $q=mysqli_query($con,"select time from notif where id_siswa='$id_siswa' and id_materi='$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
        
    }
}
?>