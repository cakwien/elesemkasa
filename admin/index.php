<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
// include koneksi
include 'config/koneksi.php';
include 'config/function.php';

// route

if($_GET['page']==true){
    // cek status login terlebih dahulu apabila mengakses route page
    if($_SESSION['login']=="login_admin"){
        include 'header.php';
        include 'navbar.php';
        include 'sidebar.php';
        if($_GET['page']=='beranda' or $GET_['page']=='index'){
            include 'system/kelas.php';
            include 'page/beranda/beranda.php';
            include 'footer.php';
        }elseif($_GET['page']=='kelas'){
            include 'system/kelas.php';
            include 'page/kelas/kelas.php';
            include 'footer.php';
            include 'page/kelas/ajax_kelas.php';
        }elseif($_GET['page']=='guru'){
            include 'system/guru.php';
            include 'page/guru/guru.php';
            include 'footer.php';
            include 'page/guru/ajax_guru.php';
        }elseif($_GET['page']=='siswa'){
            include 'system/siswa.php';
            include 'page/siswa/siswa.php';
            include 'footer.php';
            include 'page/siswa/ajax_siswa.php';
        }elseif($_GET['page']=='mata_pelajaran'){
            include 'system/mata_pelajaran.php';
            include 'page/mata_pelajaran/mata_pelajaran.php';
            include 'footer.php';
            include 'page/mata_pelajaran/ajax_mata_pelajaran.php';
        }elseif($_GET['page']=='pengampu'){
            include 'system/pengampu.php';
            include 'page/pengampu/pengampu.php';
            include 'footer.php';
            include 'page/pengampu/ajax_pengampu.php';
        }elseif($_GET['page']=='materi'){
            if($_GET['materi']=='tambah_materi'){
                include 'system/materi.php';
                include 'page/materi/materi.php';
                include 'footer.php';
                include 'page/materi/ajax_materi.php';
            }elseif($_GET['materi']=='data_sekarang'){
                include 'system/materi.php';
                include 'page/materi/data_materi.php';
                include 'footer.php';
                include 'page/materi/ajax_materi.php';
            }elseif($_GET['materi']=='detail_materi'){
                include 'system/materi.php';
                include 'page/materi/detail_materi.php';
                include 'footer.php';
                include 'page/materi/ajax_materi.php';
            }
        }elseif($_GET['page']=='presensi'){
            if($_GET['presensi']=='guru'){
                include 'page/presensi/presensi_guru.php';
            }elseif($_GET['presensi']=='siswa_awal'){
                include 'page/presensi/presensi_siswa_awal.php';
            }elseif($_GET['presensi']=='siswa_detail'){
                include 'page/presensi/presensi_siswa_detail.php';
            }
            include 'footer.php';
            include 'page/presensi/ajax_presensi.php';
            
        }
    }else{
        header("location:?pag=login");
    }
    
}elseif($_GET['system']==true){
    // cek status login terlebih dahulu apabila mengakses route system
    if($_SESSION['login']=='login_admin'){
        if($_GET['system']=='beranda' or $_GET['page']=='index'){
            include 'system/beranda.php';
        }elseif($_GET['system']=='kelas'){
            include 'system/kelas.php';
        }elseif($_GET['system']=='guru'){
            include 'system/guru.php';
        }elseif($_GET['system']=='siswa'){
            include 'system/siswa.php';
        }elseif($_GET['system']=='mata_pelajaran'){
            include 'system/mata_pelajaran.php';
        }elseif($_GET['system']=='pengampu'){
            include 'system/pengampu.php';
        }elseif($_GET['system']=='materi'){
            include 'system/materi.php';
        }elseif($_GET['system']=='presensi'){
            include 'system/presensi.php';
        }
    }else{
        header("location:?pag=login");
    }
}elseif($_GET['pag']=='login'){
    // cek status login
    if($_GET['aksi']=='logout'){

    }else{
        if($_SESSION['login']=='login_admin'){
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
    // header('location:?pag=login');
}



?>