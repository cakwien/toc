<?php
class jadwal{
    function all($con)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_jadwal join modul on u_jadwal.id_modul = modul.id_modul join rombel on jadwal.id_rombel = rombel.id_rombel join kelas on rombel.id_rombel = kelas.id_kelas");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

   
}
?>