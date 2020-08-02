<?php

if($_GET['aksi']=='data_siswa'){
    $siswa=mysqli_query($koneksi,"select * from siswa left join kelas on siswa.id_kelas=kelas.id_kelas ");
    $data=array();
    while($d = mysqli_fetch_array($siswa)){
    $data[]=array(
        'id_siswa'=>$d['id_siswa'],
        'nisn'=>$d['nisn'],
        'nama_siswa'=>$d['nm_siswa'],
        'id_kelas'=>$d['id_kelas'],
        'nama_kelas'=>$d['nm_kelas'],
        'tingkat'=>$d['tingkat'],
        'username'=>$d['username'],
        'password'=>$d['password'],
    );
    }
echo json_encode($data); 

}elseif($_GET['aksi']=='select_data_siswa'){
    $id=$_GET['id'];
    $siswa=mysqli_query($koneksi,"select * from siswa left join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_siswa='$id'");
    $data=array();
    while($d = mysqli_fetch_array($siswa)){
        $data[]=array(
            'id_siswa'=>$d['id_siswa'],
            'nisn'=>$d['nisn'],
            'nama_siswa'=>$d['nm_siswa'],
            'id_kelas'=>$d['id_kelas'],
            'nama_kelas'=>$d['nm_kelas'],
            'tingkat'=>$d['tingkat'],
            'username'=>$d['username'],
            'password'=>$d['password'],
        );
    }
    echo json_encode($data); 
}elseif($_GET['aksi']=='tambah_siswa'){
    $id=$_POST['id_siswa'];
    $nisn=$_POST['nisn'];
    $nama_siswa=$_POST['nama_siswa'];
    $id_kelas=$_POST['id_kelas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    mysqli_query($koneksi,"insert into siswa values ('','$nisn','$nama_siswa','$id_kelas','$username','$password')");
    $_SESSION['pesan']='bi';
    header('location:?page=siswa');
}elseif($_GET['aksi']=='edit_siswa'){
    $id=$_POST['id_siswa'];
    $nisn=$_POST['nisn'];
    $nama_siswa=$_POST['nama_siswa'];
    $id_kelas=$_POST['id_kelas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    mysqli_query($koneksi,"update siswa set nisn='$nisn',nm_siswa='$nama_siswa',id_kelas='$id_kelas',username='$username',password='$password' where id_siswa='$id'");
    $_SESSION['pesan']='be';
    header('location:?page=siswa');
}elseif($_GET['aksi']=='hapus_siswa'){
    echo $id=$_GET['id'];
    mysqli_query($koneksi,"delete from siswa where id_siswa='$id'");
    $_SESSION['pesan']='bh';
    echo "<script>alert('data berhasil dihapus')</script>";
}

?>