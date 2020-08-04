<?php
class diskusi
{
    function tpmateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select guru.nm_guru, guru.id_guru, guru.kd_guru,
                                    materi.id_materi, materi.judul, materi.ket,materi.time,
                                    kelas.id_kelas, kelas.nm_kelas from materi
                                    join ampu on materi.id_ampu = ampu.id_ampu join mapel on ampu.id_mapel = mapel.id_mapel join guru on ampu.id_guru = guru.id_guru join kelas on ampu.id_kelas = kelas.id_kelas where id_materi = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function tampildiskusi($con,$id_materi)
    {
        $list=array();
        $q=mysqli_query($con,"select post.id_post,post.id_user, post.isi, post.time as wkt_post, post.tipe,materi.id_materi, materi.judul,materi.time as wkt_materi, materi.ket, materi.file, materi.link, kelas.id_kelas, kelas.nm_kelas from post join materi on post.id_materi = materi.id_materi join ampu on materi.id_ampu = ampu.id_ampu join kelas on ampu.id_kelas = kelas.id_kelas where materi.id_materi='$id_materi'");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }
    
    function nmdiskusi($con,$tipe,$id_user)
    {
        if ($tipe == 0)
        {
            $q=mysqli_query($con,"select nm_guru from guru as nama where id_guru = '$id_user'");
            $dt=mysqli_fetch_array($q);
            return $dt;
        }else if ($tipe == 1)
        {
            $q=mysqli_query($con,"select nm_siswa from siswa as nama where id_siswa = '$id_user'");
            $dt=mysqli_fetch_array($q);
            return $dt;
        }
    }
    
    function tambahreply($con,$id_post,$id_user,$time,$isi,$tipe)
    {
        $q=mysqli_query($con,"insert into reply value('','$id_post','$id_user','$time','$isi','$tipe')");
    }
    
    function tpdiskusiall($con)
    {
        $q=mysqli_query($con,"Select * from post join guru on post.id_user guru.id_guru join materi on post.id_materi=materi.id_materi");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function tpdiskusi($con,$id_materi)
    {
        $q=mysqli_query($con,"select kelas.id_kelas, materi.file,post.tipe, post.id_post, post.id_materi, post.id_user, post.isi, post.time as wkt_post, materi.judul, materi.ket, materi.time as wkt_materi, materi.link, guru.nm_guru, kelas.nm_kelas from post join materi on post.id_materi = materi.id_materi join ampu on materi.id_ampu = ampu.id_ampu join guru on post.id_user = guru.id_guru join kelas on ampu.id_kelas = kelas.id_kelas where post.id_materi = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function tbpost($con,$id_user,$id_materi,$time,$isi,$tipe)
    {
        $q=mysqli_query($con,"insert into post value('','$id_user','$id_materi','$time','$isi','$tipe')");
        if($q)
        {
            header('location:?p=diskusi&id_materi='.$id_materi.'');
        }else
        {
            echo '<script>window.alert("Gagal Posting Diskusi");window.location.href="";</script>';
        }
    }
    
    function tbreply($con,$id_post,$id_user,$time,$isi,$tipe,$id_materi)
    {
        $q=mysqli_query($con,"insert into reply value('','$id_post','$id_user','$time','$isi','$tipe')");
        if ($q)
        {
            header('location:?p=diskusi&id_materi='.$id_materi.'');
        }else
        {
            echo '<script>window.alert("Gagal");window.location.href="";</script>';
        }
    }
    
    function tpreply($con,$id_post)
    {
        $q=mysqli_query($con,"select * from reply where id_post='$id_post' order by id_reply asc");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        //return $list;
        if (empty($list))
        {
            echo "Tidak Ada Komentar";
        }else
        {
            return $list;
        }
        
    }
    
   
    
    function carimateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select * from reply join post on reply.id_post = post.id_post join materi on post.id_materi = materi.id_materi where materi.id_materi = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
        
    function hapuspost($con,$id_post)
    {
        $q=mysqli_query($con,"delete from post where id_post = '$id_post'");
    }
    
    function hapusreply($con,$id_post)
    {
        $q=mysqli_query($con,"delete from reply where id_reply='$id_reply'");
    }
    
    function jmlpercakapan($con,$id_ampu)
    {
        $q=mysqli_query($con,"select count(id_reply) as jml from reply join post on reply.id_post = post.id_post join materi on post.id_materi = materi.id_materi join ampu on materi.id_ampu = ampu.id_ampu where ampu.id_ampu ='$id_ampu'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function hitungdiskusibymateri($con,$id_ampu)
    {
        $q=mysqli_query($con,"select count(id_post) from post join materi on post.id_materi = materi.id_materi join ampu on materi.id_ampu = ampu.id_ampu where materi.id_ampu = '$id_ampu'");
         $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function hitungreply($con,$id_post)
    {
        $q=mysqli_query($con,"select count(id_reply) as jmlreply from reply where id_post='$id_post'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function hitungdiskusi($con,$id_materi)
    {
        $q=mysqli_query($con,"select count(id_post) from post where id_materi='$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    
}
?>