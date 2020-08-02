<?php
if($_GET['aksi']=='auth'){
    $sukses_login=false;
    $username=$_POST['username'];
    $password=date('Y-m-d',strtotime($_POST['password']));
    $ver=mysqli_query($koneksi,"select * from siswa where username='$username' and password='$password'");
    echo $ver_dat=mysqli_num_rows($ver);
    if($ver_dat>=1){
        $sukses_login=true;
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION['login']="login_siswa";
        header('location:../siswa?page=beranda');
    }else{
        $_SESSION['status_login']="gagal";
        header("location:?pag=login");
    }
}elseif($_GET['aksi']=='logout'){
    session_destroy();
    header('location:?pag=login');
}
?>