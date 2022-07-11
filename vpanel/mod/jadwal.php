<?php
class jadwal{
    function all($con)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_jadwal join u_modul on u_jadwal.id_modul = u_modul.id_modul join rombel on u_jadwal.id_rombel = rombel.id_rombel join kelas on rombel.id_rombel = kelas.id_kelas group by u_jadwal.jadwal");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function all_limit($con,$limit)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_jadwal join u_modul on u_jadwal.id_modul = u_modul.id_modul join rombel on u_jadwal.id_rombel = rombel.id_rombel join kelas on rombel.id_rombel = kelas.id_kelas group by u_jadwal.jadwal order by u_jadwal.time_start limit $limit");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function allrombel($con,$jadwal)
    {
        $list=array();
        $q=mysqli_query($con,"select rombel.rombel, kelas.nm_kelas from u_jadwal join rombel on u_jadwal.id_rombel = rombel.id_rombel join kelas on rombel.id_kelas = kelas.id_kelas where u_jadwal.jadwal = '$jadwal'");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function index($con,$idjadwal)
    {
        $q=mysqli_query($con,"Select * from u_jadwal where id_jadwal = '$idjadwal'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    
   

    function insert($con,$jadwal,$idmodul,$idrombel,$start,$end,$durasi)
    {
        $q = mysqli_query($con, "insert into u_jadwal values('','$jadwal','$idmodul','$idrombel','$start','$end',$durasi)");
        if ($q) {
            header('location:?p=jadwal&msg=jadwalok');
        } else {
            header('location:?p=jadwal&msg=jadwalfail');
        }
    }

   
}
