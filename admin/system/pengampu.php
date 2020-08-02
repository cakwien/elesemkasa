<?php

if($_GET['aksi']=='data_pengampu'){
    $mapel=mysqli_query($koneksi,"select * from ampu left join kelas on ampu.id_kelas=kelas.id_kelas left join guru on ampu.id_guru=guru.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel");
    $data=array();
    while($d = mysqli_fetch_array($mapel)){
    $data[]=array(
        'id_ampu'=>$d['id_ampu'],
        'id_mapel'=>$d['id_mapel'],
        'id_guru'=>$d['id_guru'],
        'id_kelas'=>$d['id_kelas'],
        'nama_mapel'=>$d['nm_mapel'],
        'nama_guru'=>$d['nm_guru'],
        'nama_kelas'=>$d['nm_kelas'],
    );
    }
echo json_encode($data); 

}elseif($_GET['aksi']=='select_data_pengampu'){
    $id=$_GET['id'];
    $mapel=mysqli_query($koneksi,"select * from ampu left join kelas on ampu.id_kelas=kelas.id_kelas left join guru on ampu.id_guru=guru.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel where ampu.id_ampu='$id'");
    $data=array();
    while($d = mysqli_fetch_array($mapel)){
        $data[]=array(
            'id_ampu'=>$d['id_ampu'],
            'id_mapel'=>$d['id_mapel'],
            'id_guru'=>$d['id_guru'],
            'id_kelas'=>$d['id_kelas'],
            'nama_mapel'=>$d['nm_mapel'],
            'nama_guru'=>$d['nm_guru'],
            'nama_kelas'=>$d['nm_kelas'],
        );
    }
    echo json_encode($data); 
}elseif($_GET['aksi']=='tambah_pengampu'){
    $id_kelas=$_POST['id_kelas'];
    $id_guru=$_POST['id_guru'];
    $id_mapel=$_POST['id_mapel'];
    mysqli_query($koneksi,"insert into ampu values('','$id_mapel','$id_guru','$id_kelas')");
    $_SESSION['pesan']='bi';
    header('location:?page=pengampu');
}elseif($_GET['aksi']=='edit_pengampu'){
    $id=$_POST['id_ampu'];
    $id_kelas=$_POST['id_kelas'];
    $id_guru=$_POST['id_guru'];
    $id_mapel=$_POST['id_mapel'];
    mysqli_query($koneksi,"update ampu set id_mapel='$id_mapel',id_guru='$id_guru',id_kelas='$id_kelas' where id_ampu='$id'");
    $_SESSION['pesan']='be';
    header('location:?page=pengampu');
}elseif($_GET['aksi']=='hapus_pengampu'){
    echo $id=$_GET['id'];
    mysqli_query($koneksi,"delete from ampu where id_ampu='$id'");
    $_SESSION['pesan']='bh';
}

?>