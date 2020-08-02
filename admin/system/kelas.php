<?php

if($_GET['aksi']=='data_kelas'){
    $kelas=mysqli_query($koneksi,"select * from kelas left join guru on kelas.id_guru=guru.id_guru ");
    $data=array();
    while($d = mysqli_fetch_array($kelas)){
    $data[]=array(
        'id_kelas'=>$d['id_kelas'],
        'nama_kelas'=>$d['nm_kelas'],
        'id_guru'=>$d['id_guru'],
        'nama_guru'=>$d['nm_guru'],
        'tingkat'=>$d['tingkat'],
    );
    }
echo json_encode($data); 

}elseif($_GET['aksi']=='select_data_kelas'){
    $id=$_GET['id'];
    $kelas=mysqli_query($koneksi,"select * from kelas left join guru on kelas.id_guru=guru.id_guru where kelas.id_kelas='$id'");
    $data=array();
    while($d = mysqli_fetch_array($kelas)){
        $data[]=array(
            'id_kelas'=>$d['id_kelas'],
            'nama_kelas'=>$d['nm_kelas'],
            'id_guru'=>$d['id_guru'],
            'nama_guru'=>$d['nm_guru'],
            'tingkat'=>$d['tingkat'],
        );
    }
    echo json_encode($data); 
}elseif($_GET['aksi']=='tambah_kelas'){
    $id=$_POST['id_kelas'];
    $nama_kelas=$_POST['nama_kelas'];
    $tingkat=$_POST['tingkat'];
    $wali_kelas=$_POST['wali_kelas'];
    mysqli_query($koneksi,"insert into kelas values ('','$nama_kelas','$tingkat','$wali_kelas')");
    $_SESSION['pesan']='bi';
    header('location:?page=kelas');
}elseif($_GET['aksi']=='edit_kelas'){
    $id=$_POST['id_kelas'];
    $tingkat=$_POST['tingkat'];
    $nama_kelas=$_POST['nama_kelas'];
    $wali_kelas=$_POST['wali_kelas'];
    mysqli_query($koneksi,"update kelas set nm_kelas='$nama_kelas', tingkat='$tingkat',id_guru='$wali_kelas' where id_kelas='$id'");
    $_SESSION['pesan']='be';
    header('location:?page=kelas');
}elseif($_GET['aksi']=='hapus_kelas'){
    echo $id=$_GET['id'];
    mysqli_query($koneksi,"delete from kelas where id_kelas='$id'");
    $_SESSION['pesan']='bh';
    echo "<script>alert('data berhasil dihapus')</script>";
}

?>