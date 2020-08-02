<?php

if($_GET['aksi']=='cari_presensi_guru'){
    $id_guru=$_POST['id_guru'];
    header('location:?page=presensi&presensi=guru&id_guru='.$id_guru);
}elseif($_GET['aksi']=='cari_kelas_siswa'){
    $id_kelas=$_POST['id_kelas'];
    header('location:?page=presensi&presensi=siswa_awal&id_kelas='.$id_kelas);
}elseif($_GET['aksi']=='lihat_detail'){
    $id_ampu=$_POST['id'];
    $data_guru=mysqli_query($koneksi,"select * from ampu left join guru on guru.id_guru=ampu.id_guru left join mapel on ampu.id_mapel=mapel.id_mapel left join kelas on kelas.id_kelas=ampu.id_kelas where ampu.id_ampu='$id_ampu'");
    while($d = mysqli_fetch_array($data_guru)){
    echo "
    <table>
        <tr>
            <td>Mata Pelajaran </td>
            <td>: <b>$d[nm_mapel]</b></td>
        </tr>
        <tr>
            <td>Nama Pengajar</td>
            <td>: <b>$d[nm_guru]</b></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>: <b>$d[nm_kelas]</b></td>
        </tr>
    </table>
    ";
    }
    echo "
    <table class='table table-bordered ' style='margin-top:30px;'>
        <thead>
            <tr>
                <td>No</td>
                <td>Tanggal</td>
                <td>Judul Materi</td>
            </tr>
        </thead>
        <tbody>
    ";
    $no=1;
    $materi=mysqli_query($koneksi,"select * from materi where id_ampu='$id_ampu' ");
    while($m=mysqli_fetch_array($materi)){
        echo "
        <tr>
            <td>$no</td>
            <td>".date('d-m-Y',$m['time'])."</td>
            <td>$m[judul]</td>
        </tr>
        ";
        $no++;
    }
    echo "
    </tbody>
    </table>
    ";
}

?>