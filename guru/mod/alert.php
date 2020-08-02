<?php

class alert
{
    //TAMBAH ALERT MATERI BARU OLEH GURU
    function alertmateri($con,$id_ampu)
    {
        $q=mysqli_query($con,"select * from ampu join siswa on ampu.id_kelas = siswa.id_kelas where ampu.id_ampu = '$id_ampu'");
        while($sis=mysqli_fetch_array($q))
        {
            $siswa=$sis['id_siswa'];
            mysqli_query($con,"insert into alert_materi value('$siswa','$id_ampu')");
        }
    }
    
    //TAMBAH ALERT POST KEPADA SISWA
    function alert_post_siswa($con,$id_kelas,$id_post)
    {
        $q=mysqli_query($con,"select * from siswa where id_kelas = '$id_kelas'");
        while($sis=mysqli_fetch_array($q))
        {
            $siswa=$sis['id_siswa'];
            mysqli_query($con,"insert into alert_post_siswa value('','$siswa','$id_post','1')");
        }
    }
    
    //TAMBAH ALERT REPLY KEPADA SISWA
    function alert_reply_siswa($con,$id_kelas,$id_post)
    {
        $q=mysqli_query($con,"select * from siswa where id_kelas = '$id_kelas'");
        while($sis=mysqli_fetch_array($q))
        {
            $siswa=$sis['id_siswa'];
            mysqli_query($con,"insert into alert_post_siswa value('','$siswa','$id_post','2')");
        }
    }
    
    //JUMLAH ALERT POST UNTUK GURU
    function jml_alert_post_bymateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select count(id_alert) as jml from alert_post_guru join post on alert_post_guru.id_post=post.id_post join materi on post.id_materi = materi.id_materi where materi.id_materi = '$id_materi' and alert_post_guru.tipe='1'");
        $dt=mysqli_fetch_array($dt);
        return $dt;
    }
    
    //JUMLAH ALERT REPLY UNTUK GURU
    function jml_alert_rep_bymateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select count(id_alert) as jml from alert_post_guru join post on alert_post_guru.id_post=post.id_post join materi on post.id_materi = materi.id_materi where materi.id_materi = '$id_materi' and alert_post_guru.tipe='2'");
        $dt=mysqli_fetch_array($dt);
        return $dt;
    }
    
    //HAPUS ALERT KETIKA GURU MEMBUKA ALERT
    function buka_alert_guru($con,$id_post)
    {
        $q=mysqli_query($con,"delete from alert_post_guru where id_post='$id_post'");
    }
    
}

?>