<?php

class materi
{
    function tampilall($con,$id_ampu)
    {
        $list=array();
        $q=mysqli_query($con,"select * from materi join ampu on materi.id_ampu = ampu.id_ampu join guru on ampu.id_guru = guru.id_guru where ampu.id_ampu = '$id_ampu'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function detailmateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select * from materi join ampu on materi.id_ampu = ampu.id_ampu join guru on ampu.id_guru = guru.id_guru join mapel on ampu.id_mapel = mapel.id_mapel join kelas on ampu.id_kelas = kelas.id_kelas where materi.id_materi = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function simpan($con,$id_ampu,$judul,$ket,$jenis,$link,$berkas,$time,$expired,$sts,$tmp_files)
    {
        $q=mysqli_query($con,"insert into materi values('','$id_ampu','$judul','$ket','$jenis','$link','$berkas','$time','$expired','$sts')");
        if ($q)
        {
            move_uploaded_file($tmp_files, '/file/'.$berkas);
            echo '<script>window.alert("Berhasil Tambah Materi");window.location.href="?p=mapel&id_ampu='.$id_ampu.'"</script>';
            
        }else
        {
            echo '<script>window.alert("Gagal Tambah Materi");window.location.href=""</script>';
        }
    }
    
    function hapusmateri($con,$id_materi,$id_post,$id_ampu)
    {
        $q=mysqli_query($con,"Select file from materi where id_materi = '$id_materi'");
        if ($q)
        {
            $fl=mysqli_fetch_array($q);
            $filehapus=$fl['file'];
            unlink('upload/'.$filehapus);
            mysqli_query($con,"delete from reply where id_post='$id_post'");
            mysqli_query($con,"delete from post where id_materi='$id_materi'");
            mysqli_query($con,"delete from materi where id_materi = '$id_materi'");
            echo '<script>window.alert("Materi berhasil di Hapus");window.location.href="?p=mapel&id_ampu='.$id_ampu.'"</script>';
        } 
        else
        {
            echo '<script>window.alert("Materi Gagal di Hapus");window.location.href=""</script>';
        }
    }
    
    function tampiltb($con,$id_ampu)
    {
        $q=mysqli_query($con,"select * from materi where id_ampu = '$id_ampu'");
    }
    
    function jmlmateri($con,$id_ampu)
    {
        $q=mysqli_query($con,"select count(id_materi) as jumlah_materi from materi where id_ampu = '$id_ampu'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    
    
    function jmlreply($con,$id_materi)
    {
        $q=mysqli_query($con,"select count(id_reply) as jml from reply join post on reply.id_post = post.id_post join materi on post.id_materi = materi.id_materi where post.id_materi  = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function cekpost($con,$id_materi)
    {
        $q=mysqli_query($con, "select count(id_post) as jml from post where id_materi = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function publikasi($con,$id_materi,$id_ampu)
    {
        mysqli_query($con,"update materi set sts='1' where id_materi='$id_materi'");
        header('location:?p=mapel&id_ampu='.$id_ampu.'');
        //echo'<script>window.history.back();</script>';
    }
    
    function arsipkan($con,$id_materi,$id_ampu)
    {
        mysqli_query($con,"update materi set sts='0' where id_materi='$id_materi'");
        header('location:?p=mapel&id_ampu='.$id_ampu.'');
        //echo'<script>window.history.back();</script>';
    }
    
    function editmateri($con,$id_materi)
    {
        $q=mysqli_query($con,"select * from materi where id_materi = '$id_materi'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
  
    
}

?>