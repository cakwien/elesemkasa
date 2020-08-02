<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');

// include koneksi
include 'config/koneksi.php';
include 'config/function.php';
include 'system/global.php';


if($_GET['page']==true){
    
    // cek status login terlebih dahulu apabila mengakses route page
    if($_SESSION['login']=='login_siswa'){
        include 'header.php';
        include 'navbar.php';
        include 'sidebar.php';
        if($_GET['page']=='beranda' or $_GET['page']=='index'){
            include 'page/beranda/beranda.php';
            include 'footer.php';
        }elseif($_GET['page']=='mata_pelajaran'){
            include 'page/mata_pelajaran/mata_pelajaran.php';
        }elseif($_GET['page']=='mata_pelajaran_detail'){
            include 'page/mata_pelajaran/mata_pelajaran_detail.php';
            include 'footer.php';
        }elseif($_GET['page']=='detail_tugas'){
            include 'system/tugas.php';
            include 'page/mata_pelajaran/detail_tugas.php';
            include 'footer.php';
            include 'page/mata_pelajaran/ajax_mata_pelajaran.php';
        }elseif($_GET['page']=='laporan_presensi'){
            include 'page/presensi/presensi.php';
            include 'footer.php';
        }
        

    }else{
        header("location:?pag=login");
    }
}elseif($_GET['system']==true){
    // cek status login terlebih dahulu apabila mengakses route system
    if($_SESSION['login']=='login_siswa'){
        if($_GET['system']=='beranda' or $_GET['system']=='index'){
            include 'system/beranda.php';
        }elseif($_GET['system']=='mata_pelajaran'){
            include 'system/mata_pelajaran.php';
        }elseif($_GET['system']=='mata_pelajaran_detail'){
            include 'system/mata_pelajaran.php';
        }elseif($_GET['system']=='detail_tugas'){
            include 'system/tugas.php';
        }elseif($_GET['system']=='laporan_presensi'){
            include 'system/presensi.php';
        }
    }else{
        header("location:?pag=login");
    }
}elseif($_GET['pag']=='login'){
    if($_GET['aksi']=='logout'){
        
    }else{
        if($_SESSION['login']=='login_siswa'){
            $_SESSION['login']='';
        }
    }
    
    // session_destroy(); 
    // $_SESSION['status_login']=='';
    include 'system/login.php';
    include 'login.php';
    
}else{
    // menuju halaman error ketika url asal ketik
    include 'error.php';
}



?>