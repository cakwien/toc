<?php
class kelas{
    function all($con)
    {
        $list = array();
        $q = mysqli_query($con, "select * from kelas");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function allrombel($con)
    {
        $list = array();
        $q = mysqli_query($con, "select * from rombel join kelas on rombel.id_kelas = kelas.id_kelas");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function indexkelas($con,$idkelas)
    {
        $q = mysqli_query($con, "select * from kelas where id_kelas = $idkelas");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function indexrombel($con,$idrombel)
    {
        $q = mysqli_query($con, "select * from rombel join kelas on rombel.id_kelas = kelas.id_kelas where id_rombel = '$idrombel'");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    
}
?>

