<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename= presensi.xls");

$con=mysqli_connect('localhost','root','','lms');
$id_kelas=$_GET['id_kelas'];
$id_materi=$_GET['id_materi'];
$mt=mysqli_query($con,"select * from materi join ampu on materi.id_ampu = ampu.id_ampu join mapel on ampu.id_mapel = mapel.id_mapel join kelas on ampu.id_kelas = kelas.id_kelas where materi.id_materi= '$id_materi'");
$detmat=mysqli_fetch_array($mt);
?>



<table>
    <tr>
        <td>Mata Pelajaran</td>
        <td>: <?php echo  $detmat['nm_mapel'];?></td>
    </tr>
     <tr>
        <td>Materi</td>
        <td>: <?php echo  $detmat['judul'];?></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>: <?php echo  $detmat['nm_kelas'];?></td>
    </tr>
</table>

<table border="1">
    <thead>
       <tr>
            <th>No.</th>
            <th>NISN</th>
            <th>Nama Siswa</th>
            <th>Presensi</th>
            <th>Wkt Presensi</th>
        </tr>
    </thead>
    
    <?php
        
        $q1=mysqli_query($con,"select * from siswa where id_kelas = '$id_kelas'");
        $no=1;
        while($sis=mysqli_fetch_array($q1))
        {
            
            $id_siswa=$sis['id_siswa'];
            $q2=mysqli_query($con,"select time from notif where id_materi = '$id_materi' and notif.id_siswa = '$id_siswa'");
            $abs=mysqli_fetch_array($q2);
            $tm=date('d-m-Y | H:i',$abs['time']);
    
    ?>
    
    <tbody>
        <tr>
            <td><?=$no?></td>
            <td><?=$sis['nisn']?></td>
            <td><?=strtoupper($sis['nm_siswa'])?></td>
            <td>
            <?php if(!empty($abs['time']))
                  {
                  echo "<center> v </center>";
                  }
                  else
                  {
                   echo " - ";
                  }
                  ?>
            </td>
            <td> <?php if(!empty($abs['time']))
                  {
                  echo $tm;
                  }
                  else
                  {
                   echo " - ";
                  }
                  ?></td>
        </tr>
    </tbody>
    
     <?php $no++; } ?>
</table>

