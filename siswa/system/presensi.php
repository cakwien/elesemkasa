<?php

if($_GET['aksi']=='cari'){
    $tanggal=date('Y-m-d',strtotime("$_POST[tahun]-$_POST[bulan]-1"));
    header('location:?page=laporan_presensi&tanggal_cari='.$tanggal);
}

?>