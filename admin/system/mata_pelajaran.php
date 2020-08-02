<?php

if($_GET['aksi']=='data_mata_pelajaran'){
    $mapel=mysqli_query($koneksi,"select * from mapel ");
    $data=array();
    while($d = mysqli_fetch_array($mapel)){
    $data[]=array(
        'id_mapel'=>$d['id_mapel'],
        'nama_mapel'=>$d['nm_mapel'],
        'tingkat'=>$d['tingkat'],
    );
    }
echo json_encode($data); 

}elseif($_GET['aksi']=='select_data_mata_pelajaran'){
    $id=$_GET['id'];
    $mapel=mysqli_query($koneksi,"select * from mapel where id_mapel='$id'");
    $data=array();
    while($d = mysqli_fetch_array($mapel)){
        $data[]=array(
            'id_mapel'=>$d['id_mapel'],
            'nama_mapel'=>$d['nm_mapel'],
            'tingkat'=>$d['tingkat'],
        );
    }
    echo json_encode($data); 
}elseif($_GET['aksi']=='tambah_mata_pelajaran'){
    $nama_mapel=$_POST['nama_mapel'];
    $tingkat=$_POST['tingkat'];
    mysqli_query($koneksi,"insert into mapel values('','$nama_mapel','$tingkat')");
    $_SESSION['pesan']='bi';
    header('location:?page=mata_pelajaran');
}elseif($_GET['aksi']=='edit_mata_pelajaran'){
    $id=$_POST['id_mapel'];
    $nama_mapel=$_POST['nama_mapel'];
    $tingkat=$_POST['tingkat'];
    mysqli_query($koneksi,"update mapel set nm_mapel='$nama_mapel',tingkat='$tingkat' where id_mapel='$id'");
    $_SESSION['pesan']='be';
    header('location:?page=mata_pelajaran');
}elseif($_GET['aksi']=='hapus_mata_pelajaran'){
    echo $id=$_GET['id'];
    mysqli_query($koneksi,"delete from mapel where id_mapel='$id'");
    $_SESSION['pesan']='bh';
}

?>