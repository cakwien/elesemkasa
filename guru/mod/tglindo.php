<?php

function tglindo($tanggal)
{
	$bulan = array (1 =>   'Januari',
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
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


function sejak($jam)
{
    $skrg=time();
    $selisih=$skrg-$jam;
    $tgl=date('d',$jam);
    $tglskrg=date('d',$skrg);
        
        if ($selisih >= 0)
        {
            $print="Baru Saja";

            if ($selisih >= 60)
            {
                $print= floor($selisih / 60) . " Menit Yang Lalu";

                if ($selisih >= 3600)
                {
                    $print= "1 Jam Yang Lalu";

                    if ($selisih >= 7200)
                    {
                        if ($tgl == $tglskrg)
                        {
                            $print="Hari ini, Pukul ". date('H:i ',$jam). "WIB";
                        }else if ($tgl != $tglskrg)
                        {
                            $print="Kemarin, Pukul ". date('H:i ',$jam). "WIB";
                        }

                        if ($selisih >= 86400)
                        {
                            $print= tglindo(date('Y-m-d',$jam))." " .date('H:i',$jam). " WIB";
                        }
                    }
                }
            }
            return $print;
        }
}


?>