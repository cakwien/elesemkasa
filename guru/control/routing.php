<?php

if (!empty($_GET['p']))
{
    $p=strtolower($_GET['p']);
    if ($p=="login")
    {
        if (!empty($_POST["user"]) && !empty($_POST["pass"])) 
		{
			$user = $_POST["user"];
			$pass = $_POST["pass"];
            $induk -> login($con,$user,$pass);
		}
		include("view/login.php");
    }
    else if ($p=="logout")
    {
        session_start();
        session_destroy();
        header('location:index.php');
    }
                                 
    else if ($p=='materi')
    {
        $id_ampu = $_GET['id_ampu'];
        $mp = $mapel->mapelampu($con,$id_ampu);
        
        if (!empty($_POST['simpan']))
        {
            $id_ampu=$_GET['id_ampu'];
            $judul=$_POST['judul'];
            $ket=$_POST['ket'];
            $jenis="1";
            $link=$_POST['link'];
            $time=time();
            $expired=strtotime($_POST['expired']);
            $sts=$_POST['status'];
            $berkas=$_FILES['berkas']['name'];
            $tmp_files=$_FILES['berkas']['tmp_name'];
            $input1=$materi->simpan($con,$id_ampu,$judul,$ket,$jenis,$link,$berkas,$time,$expired,$sts,$tmp_files);
            $input2=$alert->alertmateri($con,$id_ampu);
        }
        
        if (!empty($_GET['edit']))
        {
            $dt=$materi->editmateri($con,$_GET['edit']);
            $judul=$dt['judul'];
            $ket=$dt['ket'];
            $file=$dt['file'];
            $link=$dt['link'];
            $expired=$dt['expired'];
            $sts=$dt['sts'];
            $id_materi=$dt['id_materi'];
        } else
        {
            $judul="";
            $ket="";
            $file="";
            $link="";
            $expired="";
            $sts="";
            $id_materi="";
        }
        
        if (!empty($_POST['up']))
        {
            if (!empty($_POST['berkas']))
            {
                $id_materi=$_GET['edit'];
                $judul=$_POST['judul'];
                $ket=$_POST['ket'];
                $berkas=$_FILES['berkas']['name'];
                $tmp_files=$_FILES['berkas']['tmp_name'];
                $expired=$_POST['expired'];
                $sts=$_POST['status'];
                $link=$_POST['link'];
                $berkaslawas=$_POST['berkaslawas'];
                $input=$materi->update_upload($con,$id_ampu,$judul,$ket,$link,$berkas,$expired,$sts,$berkaslawas,$tmp_files,$id_materi);
            } else
            {
                $id_materi=$_GET['edit'];
                $judul=$_POST['judul'];
                $ket=$_POST['ket'];
                if (!empty($_POST['expired']))
                {
                    $expired=strtotime($_POST['expired']);
                }else
                {
                    $expired=strtotime($_POST['expired2']);
                }
                $sts=$_POST['status'];
                $link=$_POST['link'];
                $input=$materi->update($con,$id_ampu,$judul,$ket,$link,$expired,$sts,$id_materi);
            }
        }
     
        
        
        
        include('view/guru.php');
    }
    
    else if ($p=='main')
    {
        
        include('view/guru.php');
    }
    
    else if ($p=='diskusi')
    {
        $id_materi = $_GET['id_materi'];
       $dis=$diskusi->tpdiskusi($con,$id_materi);
        $jml_reply=$diskusi->hitungreply($con,$dis['id_post']);
        
        if (!empty($_POST['reply']))
        {
            $id_user=$_POST['id_user'];
            $id_post=$_POST['id_post'];
            $time=time();
            $isi=$_POST['reply'];
            $tipe="0";
            $input=$diskusi->tambahreply($con,$id_post,$id_user,$time,$isi,$tipe);
            //$input2=$alert->alert_reply_siswa($con,$id_kelas,$id_post);
        }
        
        include('view/guru.php');
    }
    
    else if ($p=='mapel')
    {
        $id_ampu = $_GET['id_ampu'];
        $mp = $mapel->mapelampu($con,$id_ampu);
        $jm = $materi->jmlmateri($con,$id_ampu);
        
        if (!empty($_GET['hapus']))
        {
            $id_materi=$_GET['hapus'];
            $id_ampu=$_GET['id_ampu'];
            $hpmt=$diskusi->carimateri($con,$id_materi);
            $id_post=$hpmt['id_post'];
            $materi->hapusmateri($con,$id_materi,$id_post,$id_ampu);
        }
        
        if (!empty($_GET['pub']))
        {
            $id_materi = $_GET['pub'];
            $materi->publikasi($con,$id_materi,$id_ampu);
        }
        
        if (!empty($_GET['ar']))
        {
            $id_materi=$_GET['ar'];
            $materi->arsipkan($con,$id_materi,$id_ampu);
        }
        include('view/guru.php');
        
    }
    else if ($p=="post")
    {
        $id_materi=$_GET['id'];
        $mt = $diskusi->tpmateri($con,$id_materi);
        
        if (!empty($_POST['posting']))
        {
            $id_materi=$mt['id_materi'];
            $id_user = $mt['id_guru'];
            $time = time();
            $isi=$_POST['isi'];
            $tipe='0';
            $input=$diskusi->tbpost($con,$id_user,$id_materi,$time,$isi,$tipe);
        }
        
        include('view/guru.php');
    }
    else if ($p=="detail")
    {
        $id_materi = $_GET['id'];
        $det=$materi->detailmateri($con,$id_materi);
        include('view/guru.php');
    }
    
    else if ($p=="profil")
    {
        
        include('view/guru.php');
    }
    else if ($p=="gantipw")
    {
        if (!empty($_POST['pwlama']))
        {
            $pwlama=$_POST['pwlama'];
            $pwbaru=$_POST['pwbaru'];
            $id_guru=$_POST['id_guru'];
            $input=$guru->gantipw($con,$pwlama,$pwbaru,$id_guru);
        }
        
        
        include('view/guru.php');
    }
    
    else if ($p=="presensi")
    {
        include('view/guru.php');
    }
    
    else
    {
        echo "404_page_not_found";
    }
}
else 
{
    header('location:?p=login');
}

?>