<?php
// ver presensi apakah sudah pernah mengunjungi materi tersebut
if($_GET['page']='detail_tugas'){
    $id_materi=$_GET['id_materi'];
    $time=time();
    $jum_data=mysqli_num_rows(mysqli_query($koneksi,"select * from notif where id_siswa='$glob_id_siswa' and id_materi='$id_materi'"));
   
    if($jum_data==0){
        mysqli_query($koneksi,"insert into notif values ('$glob_id_siswa','$id_materi','$time')");
    }else{

    }
}

if($_GET['aksi']=='tambah_diskusi'){
    $diskusi=$_POST['diskusi'];
    $id_materi=$_POST['id_materi'];
    $time=time();
    $tipe=1;
    // tipe 1 adalah tipe untuk siswa sedangkan guru adalah tipe 0
    mysqli_query($koneksi,"insert into post values ('','$glob_id_siswa','$id_materi','$time','$diskusi','$tipe')");
    $_SESSION['pesan']='td';
    header('location:?page=detail_tugas&id_materi='.$id_materi);
}elseif($_GET['aksi']=='hapus_diskusi'){
    echo $id=$_GET['id'];
    $post=mysqli_query($koneksi,"select * from post where id_post='$id'");
    while($p = mysqli_fetch_array($post)){
        mysqli_query($koneksi,"delete from reply where id_post='$p[id_post]'");
    }
    mysqli_query($koneksi,"delete from post where id_post='$id'");
    $_SESSION['pesan']='hd';

}elseif($_GET['aksi']=='select_diskusi'){
    $id=$_GET['id'];
    $diskusi=mysqli_query($koneksi,"select * from post where id_post='$id'");
    $data=array();
    while($d = mysqli_fetch_array($diskusi)){
        if($d['tipe']=='1'){
            $user=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from siswa where id_siswa='$d[id_user]'"));
            $nama_user=$user['nm_siswa'];
            $tipe_user="siswa";
        }elseif($d['tipe']=='0'){
            $user=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from ampu left join guru on ampu.id_guru=guru.id_guru where id_ampu='$d[id_user]'"));
            $nama_user=$user['nm_guru'];
            $tipe_user="guru";
        }
        $data[]=array(
            'id_post'=>$d['id_post'],
            'isi'=>$d['isi'],
            'nama_user'=>$nama_user,
            'tipe'=>$tipe_user,
        );
    }
    echo json_encode($data); 
}elseif($_GET['aksi']=='edit_diskusi'){
    $diskusi=$_POST['diskusi'];
    $id_diskusi=$_POST['id_diskusi'];
    $id_materi=$_POST['id_materi'];
    mysqli_query($koneksi,"update post set isi='$diskusi' where id_post='$id_diskusi'");
    $_SESSION['pesan']='ed';
    header('location:?page=detail_tugas&&id_materi='.$id_materi);

}elseif($_GET['aksi']=='tambah_komentar'){
    $komentar=$_POST['komentar'];
    $id_materi=$_GET['id_materi'];
    $id_post=$_POST['id_post'];
    $time=time();
    $tipe=1;
    // tipe 1 adalah tipe untuk siswa sedangkan guru adalah tipe 0
    mysqli_query($koneksi,"insert into reply values ('','$id_post','$glob_id_siswa','$time','$komentar','$tipe')");
    $_SESSION['pesan']='tk';
    header('location:?page=detail_tugas&id_materi='.$id_materi);
}elseif($_GET['aksi']=='hapus_komentar'){
    $id=$_GET['id'];
    mysqli_query($koneksi,"delete from reply where id_reply='$id'");
    $_SESSION['pesan']='hk';

}elseif($_GET['aksi']=='select_komentar'){
    $id=$_GET['id'];
    $diskusi=mysqli_query($koneksi,"select * from reply where id_reply='$id'");
    $data=array();
    while($d = mysqli_fetch_array($diskusi)){
        if($d['tipe']=='1'){
            $user=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from siswa where id_siswa='$d[id_user]'"));
            $nama_user=$user['nm_siswa'];
            $tipe_user="siswa";
        }elseif($d['tipe']=='0'){
            $user=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from ampu left join guru on ampu.id_guru=guru.id_guru where id_ampu='$d[id_user]'"));
            $nama_user=$user['nm_guru'];
            $tipe_user="guru";
        }
        $data[]=array(
            'id_reply'=>$d['id_reply'],
            'isi'=>$d['isi'],
            'nama_user'=>$nama_user,
            'tipe'=>$tipe_user,
        );
    }
    echo json_encode($data); 
}elseif($_GET['aksi']=='edit_komentar'){
    $komentar=$_POST['komentar'];
    $id_komentar=$_POST['id_komentar'];
    $id_materi=$_POST['id_materi'];
    mysqli_query($koneksi,"update reply set isi='$komentar' where id_reply='$id_komentar'");
    $_SESSION['pesan']='ek';
    header('location:?page=detail_tugas&&id_materi='.$id_materi);

}
                        

?>