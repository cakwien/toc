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

    function rombelkelas($con,$idkelas)
    {
        $list = array();
        $q = mysqli_query($con, "select * from rombel join kelas on rombel.id_kelas = kelas.id_kelas where kelas.id_kelas = '$idkelas'");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function inputkelas($con,$nm_kelas)
    {
        $q=mysqli_query($con,"insert into kelas value('','$nm_kelas)')");
        if($q)
        {
            echo msg("Kelas berhasil di simpan","?p=kelas");
        }else
        {
            echo msg("Kelas Gagal di simpan", "?p=kelas");
        }
    }

    
}
?>

