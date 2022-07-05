<?php

class ujian{

    function allujianbyrombel($con,$id_rombel)
    {
        $list=array();
        $q=mysqli_query($con,"select * from u_jadwal join u_modul on u_jadwal.id_modul = u_modul.id_modul join rombel on u_jadwal.id_rombel = rombel.id_rombel where u_jadwal.id-rombel = '$id_rombel'");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;

    }

    function tpjadwalaktif($con,$idrombel)
    {
        $q=mysqli_query($con,"Select * from u_jadwal join u_modul on u_jadwal.id_modul = u_modul.if_modul where u_jadwal.id_rombel = '$idrombel' order by time_start ASC limit 1");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function insertsoaltemp($con,$idsiswa,$idjadwal,$idmodul,$idsoal,$opsi1,$opsi2,$opsi3,$opsi4,$opsi5)
    {
        $q=mysqli_query($con,"insert into u_tempsoal values('','$idsiswa','$idjadwal','$idmodul','$idsoal','$opsi1','$opsi2','$opsi3','$opsi4','$opsi5')");
        if ($q) {
            header('location:?p=soal');
        } else {
            echo '<script>window.alert("Gagal masuk tryOut")</script>';
        }
    }

    function starttestrun($con,$idsiswa,$idjadwal,$start,$sisa)
    {
        $q=mysqli_query($con,"insert into u_testrun values('','$idsiswa','$idjadwal','$start','$sisa')");
        if($q)
        {
            header('location:?p=soal');
        }else
        {
            echo '<script>window.alert("Gagal masuk tryOut")</script>';
        }
    }
}

?>