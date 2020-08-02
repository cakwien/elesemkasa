<?PHP
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
	
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function hari_ini($hari){
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
	return "<b>" . $hari_ini . "</b>";
}

function bulan_ini($bulan){
 
	switch($bulan){
		case '1':
			$bulan_ini = "Januari";
		break;
 
		case '2':			
			$bulan_ini = "Februari";
		break;
 
		case '3':
			$bulan_ini = "Maret";
		break;
 
		case '4':
			$bulan_ini = "April";
		break;
 
		case '5':
			$bulan_ini = "Mei";
		break;
 
		case '6':
			$bulan_ini = "Juni";
		break;
 
		case '7':
			$bulan_ini = "Juli";
		break;

		case '8':
			$bulan_ini = "Agustus";
		break;

		case '9':
			$bulan_ini = "September";
		break;

		case '10':
			$bulan_ini = "Oktober";
		break;

		case '11':
			$bulan_ini = "Novermber";
		break;

		case '12':
			$bulan_ini = "Desember";
		break;
		
		default:
			$bulan_ini = "Tidak di ketahui";		
		break;
	}
	return "<b>" . $bulan_ini . "</b>";
}
?>