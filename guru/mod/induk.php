<?php

class induk
{
    function login($con,$user,$pass)
    {
        $q=mysqli_query($con,"Select * from guru where username = '$user' and password = '$pass'");
        $cek=mysqli_fetch_array($q);
        if (!empty($cek[0]))
        {
            session_start();
            $_SESSION['username'] = $user;
            header('Location:?p=main');
        }
        else 
        {
            echo '<script>window.alert("USERNAME DAN PASSWORD SALAH, ULANGI KEMBALI");window.location.href="?p=login"</script>';
        }
    }
    
    function useraktif($con,$user)
    {
        $q=mysqli_query($con,"select * from guru where username = '$user'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function randwarna($warna)
    {
        $warna = array("red","yellow","aqua","green");
        shuffle($warna);
        $warna2=array_shift($warna);
        return $warna2;
    }
}

?>