<?php
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$glob_ver=mysqli_query($koneksi,"select * from siswa left join kelas on siswa.id_kelas=kelas.id_kelas left join guru on kelas.id_guru=guru.id_guru where siswa.username='$username' and siswa.password='$password'");
while($w = mysqli_fetch_array($glob_ver)){
    $glob_id_siswa=$w['id_siswa'];
    $glob_nama_siswa=$w['nm_siswa'];
    $glob_nisn=$w['nisn'];
    $glob_nama_kelas=$w['nm_kelas'];
    $glob_id_kelas=$w['id_kelas'];
    $glob_nama_wali_kelas=$w['nm_guru'];
}

$glob_data_kelas=mysqli_query($koneksi,"select * from siswa where id_kelas='$glob_id_kelas'");
$glob_jum_siswa_kelas=mysqli_num_rows($glob_data_kelas);

$glob_data_ampu=mysqli_query($koneksi,"select * from ampu where id_kelas='$glob_id_kelas'");
$glob_jum_ampu=mysqli_num_rows($glob_data_ampu);
?>