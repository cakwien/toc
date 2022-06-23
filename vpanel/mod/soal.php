<?php
class soal{
    function all($con)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_soal");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function soalbymodul($con,$modul)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_soal where id_modul = $modul");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function index($con,$id)
    {
        $q=mysqli_query($con,"select * from u_soal where id_soal = $id");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function insert($con,$modul,$soal)
    {
        mysqli_query($con,"insert into u_soal values('','$modul','$soal')");
    }
}
?>