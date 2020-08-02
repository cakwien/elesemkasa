<?php
if($_GET['aksi']=='cari_materi_kelas'){
    $id_kelas=$_POST['id_kelas'];
    header('location:?page=materi&materi=data_kelas&id_kelas='.$id_kelas);
}elseif($_GET['aksi']=='select_ampu'){
    $id=$_POST['id'];
    $ampu=mysqli_query($koneksi,"select * from ampu left join mapel on ampu.id_mapel=mapel.id_mapel left join guru on guru.id_guru=ampu.id_guru where ampu.id_kelas='$id'");
    // $data=array();
    while($d = mysqli_fetch_array($ampu)){
        // $data[]=array(
        //     'id_ampu'=>$d['id_ampu'],
        //     'id_mapel'=>$d['id_mapel'],
        //     'nama_mapel'=>$d['nm_mapel'],
        // );
        echo "<option value=".$d['id_ampu'].">".$d['nm_mapel']." ( ".$d['nm_guru']." )</option>";
    }
    // echo json_encode($data); 
    
}elseif($_GET['aksi']=='upload_materi'){
    // deklarasi variabel
    $id_ampu=$_POST['pengampu'];
    $judul=$_POST['judul'];
    $ket=$_POST['deskripsi'];
    $jenis=$_POST['jenis'];
    $link=$_POST['link'];
    $time=time();
    $expired=strtotime($_POST['batas_akhir']);
    $sts=$_POST['status'];
    // pengaturan upload
    $rand = rand();
    $ekstensi =  array('jpeg','jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','xlsx','docx','pdf','pptx','ppt');
    $filename = $_FILES['file']['name'];
    $ukuran = $_FILES['file']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        $_SESSION['pesan']='ge';
        // header('location:?page=materi&materi=tambah_materi');
        header('location:?page=materi&materi=tambah_materi');
    }else{
        if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['file']['tmp_name'], '../file/'.$rand.'_'.$filename);
            // query upload
            mysqli_query($koneksi, "INSERT INTO materi VALUES('','$id_ampu','$judul','$ket','$jenis','$link','$xx','$time','$expired','$sts')");
            $_SESSION['pesan']='bi';
            // header('location:?page=materi&materi=tambah_materi');
            header('location:?page=materi&materi=tambah_materi');
        }else{
            $_SESSION['pesan']='gu';
            // header('location:?page=materi&materi=tambah_materi');
            header('location:?page=materi&materi=tambah_materi');
        }
}
}elseif($_GET['aksi']=='hapus_materi'){
    echo $id=$_GET['id'];
    mysqli_query($koneksi,"delete from notif where id_materi='$id'");
    $post=mysqli_query($koneksi,"select * from post where id_materi='$id'");
    while($p = mysqli_fetch_array($post)){
        mysqli_query($koneksi,"delete from reply where id_post='$p[id_post]'");
    }
    mysqli_query($koneksi,"delete from post where id_materi='$id'");
    mysqli_query($koneksi,"delete from materi where id_materi='$id'");
    $_SESSION['pesan']='bh';

}elseif($_GET['aksi']=='edit_materi'){
    // deklarasi variabel
    $id_materi=$_POST['id_materi'];
    $judul=$_POST['judul'];
    $ket=$_POST['deskripsi'];
    $jenis=$_POST['jenis'];
    $link=$_POST['link'];
    $nama_file=$_POST['nama_file'];
    $time=time();
    $expired=strtotime($_POST['batas_akhir']);
    $sts=$_POST['status'];
        // pengaturan upload
        $rand = rand();
        $ekstensi =  array('jpeg','jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','xlsx','docx','pdf','ppt','pptx');
        $filename = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if($filename!=''){
        
        if(!in_array($ext,$ekstensi) ) {
            $_SESSION['pesan']='ge';
            // header('location:?page=materi&materi=tambah_materi');
            header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);
        }else{
            if($ukuran < 1044070){		
                // menghapus file sebelumnya
                unlink("../file/".$nama_file);
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['file']['tmp_name'], '../file/'.$rand.'_'.$filename);
                // query upload
                mysqli_query($koneksi, "update materi set judul='$judul' , ket='$ket' , jenis='$jenis' ,link='$link',file='$xx', expired='$expired' , sts='$sts' where id_materi='$id_materi'  ");
                $_SESSION['pesan']='bi';
                // header('location:?page=materi&materi=tambah_materi');
                header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);
            }else{
                $_SESSION['pesan']='gu';
                // header('location:?page=materi&materi=tambah_materi');
                header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);
            }
    }
    }else{
        // query upload
        mysqli_query($koneksi, "update materi set judul='$judul' , ket='$ket' , jenis='$jenis' ,link='$link', expired='$expired' , sts='$sts' where id_materi='$id_materi'  ");
        $_SESSION['pesan']='bi';
        // header('location:?page=materi&materi=tambah_materi');
        header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);
    }

    
    
    
}elseif($_GET['aksi']=='tambah_diskusi'){
    $diskusi=$_POST['diskusi'];
    $id_materi=$_POST['id_materi'];
    $time=time();
    $tipe=0;
    $id_ampu=$_POST['id_ampu'];
    // tipe 1 adalah tipe untuk siswa sedangkan guru adalah tipe 0
    mysqli_query($koneksi,"insert into post values ('','$id_ampu','$id_materi','$time','$diskusi','$tipe')");
    $_SESSION['pesan']='td';
    header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);
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
    header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);

}elseif($_GET['aksi']=='tambah_komentar'){
    $komentar=$_POST['komentar'];
    $id_materi=$_GET['id_materi'];
    $id_post=$_POST['id_post'];
    $time=time();
    $tipe=0;
    $id_ampu=$_POST['id_ampu'];
    // tipe 1 adalah tipe untuk siswa sedangkan guru adalah tipe 0
    mysqli_query($koneksi,"insert into reply values ('','$id_post','$id_ampu','$time','$komentar','$tipe')");
    $_SESSION['pesan']='tk';
    header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);
}elseif($_GET['aksi']=='hapus_komentar'){
    echo $id=$_GET['id'];
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
    header('location:?page=materi&materi=detail_materi&id_materi='.$id_materi);

}

?>