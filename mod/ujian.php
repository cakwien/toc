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
}

?>