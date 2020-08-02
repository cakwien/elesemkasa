<?php
class guru
{
    function tpprofil($con,$id)
    {
        $q=mysqli_query($con,"select * from guru where id_guru = '$id'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function tpampu($con,$id_guru)
    {
        $list=array();
        $q=mysqli_query($con,"select * from guru join ampu on guru.id_guru = ampu.id_guru join mapel on ampu.id_mapel = mapel.id_mapel join kelas on ampu.id_kelas = kelas.id_kelas where guru.id_guru='$id_guru'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function gantipw($con,$pwlama,$pwbaru,$id_guru)
    {
        $qcek=mysqli_query($con,"select password from guru where id_guru = '$id_guru'");
        $cek=mysqli_fetch_array($qcek);
        
        if ($cek[0] = $pwlama)
        {
            $q=mysqli_query($con,"update guru set password = '$pwbaru' where id_guru = '$id_guru'");
            if ($q)
            {
                echo '<script>window.alert("Password Berhasil Diganti");window.location.href="?p=profil"</script>';
            }else
            {
                echo '<script>window.alert("Password Gagal Diganti");window.location.href=""</script>';
            }
        } else
        {
            echo '<script>window.alert("Password Lama Salah");window.location.href=""</script>';
        }
    }
}
?>