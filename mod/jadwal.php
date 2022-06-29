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

    
}
?>