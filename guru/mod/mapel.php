<?php

class mapel
{
    function tampilampu($con,$id_guru)
    {
        $cek=mysqli_query($con,"select * from ampu where id_guru = '$id_guru'");
        $cek2=mysqli_fetch_array($cek);
        if (empty($cek2[0]))
        {
            echo "";
        } else
        {
            $q=mysqli_query($con,"select * from ampu join mapel on ampu.id_mapel = mapel.id_mapel join kelas on ampu.id_kelas = kelas.id_kelas where ampu.id_guru = '$id_guru'");
            while($data=mysqli_fetch_array($q))
            {
                $list[]=$data;
            }
            return $list;
        }
    }
    
    function mapelampu($con,$id_ampu)
    {
        $q=mysqli_query($con,"select * from ampu join mapel on ampu.id_mapel = mapel.id_mapel join guru on ampu.id_guru = guru.id_guru join kelas on ampu.id_kelas = kelas.id_kelas where ampu.id_ampu = '$id_ampu'");
        $dt=mysqli_fetch_array($q);
        return ($dt);
    }
}

?>