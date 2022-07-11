<?php
class jadwal{
    function jadwalaktifbyrombel($con,$rombel)
    {
        $list=array();
        $q=mysqli_query($con,"select * from u_jadwal join rombel on u_jadwal.id_rombel = rombel.id_rombel join kelas on rombel.id_kelas = kelas.id_kelas where u_jadwal.id_rombel = '$rombel' order by time_start");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }

    function index($con,$idjadwal)
    {
        $q=mysqli_query($con,"Select * from u_jadwal where id_jadwal = '$idjadwal'");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function jumlahjadwal($con,$idrombel)
    {
        $q = mysqli_query($con, "Select * from u_jadwal where id_rombel = '$idrombel'");
        $dt = mysqli_num_rows($q);
        return $dt;
    }

    function jumlahtryoutselesai($con,$idsiswa)
    {
        $q = mysqli_query($con, "Select * from u_hasil where id_siswa = '$idsiswa'");
        $dt = mysqli_num_rows($q);
        return $dt;
    }

    

    
}
?>