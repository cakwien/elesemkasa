<?php
$hostDB			= "localhost";
$usernameDB		= "root";
$passwordDB		= "";
$namaDB			= "lms";

//KONEKSI KE DATABASE
$con = mysqli_connect($hostDB,$usernameDB,$passwordDB,$namaDB);

//CEK KONEKSI
if(mysqli_connect_error())
{
	echo "GAGAL";
	die;
}

//SET TIMEZONE
date_default_timezone_set('Asia/Jakarta');

include('mod/materi.php');
$materi = new materi;

include('mod/induk.php');
$induk = new induk;

include('mod/mapel.php');
$mapel = new mapel;

include('mod/diskusi.php');
$diskusi = new diskusi;

include('mod/notif.php');
$notif = new notif;

include('mod/presensi.php');
$presensi = new presensi;

include('mod/guru.php');
$guru = new guru;

include('mod/alert.php');
$alert = new alert;

include('mod/tglindo.php');

include('control/routing.php');

?>