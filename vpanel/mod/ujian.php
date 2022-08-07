<?php
class ujian{

    function progress($con)
    {
        $list = array();
        $q=mysqli_query($con,"select * from u_testrun join u_jadwal on u_testrun.id_jadwal = u_jadwal.id_jadwal join siswa on u_testrun.id_siswa = siswa.id_siswa");
        while($dt = mysqli_fetch_array($q))
        {
            $list[] = $dt;
        }
        return $list;
    }

    function progressbyjadwal($con,$idjadwal)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_testrun join u_jadwal on u_testrun.id_jadwal = u_jadwal.id_jadwal join siswa on u_testrun.id_siswa = siswa.id_siswa where u_testrun.id_jadwal = '$idjadwal'");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }
}
?>