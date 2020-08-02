<?php

if($_GET['aksi']=='data_guru'){
    $guru=mysqli_query($koneksi,"select * from guru ");
    $data=array();
    while($d = mysqli_fetch_array($guru)){
    $data[]=array(
        'id_guru'=>$d['id_guru'],
        'kd_guru'=>$d['kd_guru'],
        'nama_guru'=>$d['nm_guru'],
        'username'=>$d['username'],
        'password'=>$d['password'],
    );
    }
echo json_encode($data); 

}elseif($_GET['aksi']=='select_data_guru'){
    $id=$_GET['id'];
    $guru=mysqli_query($koneksi,"select * from guru where id_guru='$id'");
    $data=array();
    while($d = mysqli_fetch_array($guru)){
        $data[]=array(
            'id_guru'=>$d['id_guru'],
            'kd_guru'=>$d['kd_guru'],
            'nama_guru'=>$d['nm_guru'],
            'username'=>$d['username'],
            'password'=>$d['password'],
        );
    }
    echo json_encode($data); 
}elseif($_GET['aksi']=='tambah_guru'){
    $nama_guru=$_POST['nama_guru1'];
    $kd_guru=$_POST['kd_guru1'];
    $username=$_POST['username1'];
    $password=$_POST['password1'];
    mysqli_query($koneksi,"insert into guru values('','$kd_guru','$nama_guru','$username','$pasword')");
    $_SESSION['pesan']='bi';
    header('location:?page=guru');
}elseif($_GET['aksi']=='edit_guru'){
    $id=$_POST['id_guru'];
    $nama_guru=$_POST['nama_guru'];
    $kd_guru=$_POST['kd_guru'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    mysqli_query($koneksi,"update guru set kd_guru='$kd_guru',nm_guru='$nama_guru',username='$username',password='$password' where id_guru='$id'");
    $_SESSION['pesan']='be';
    header('location:?page=guru');
}elseif($_GET['aksi']=='hapus_guru'){
    echo $id=$_GET['id'];
    mysqli_query($koneksi,"delete from guru where id_guru='$id'");
    $_SESSION['pesan']='bh';
}

?>