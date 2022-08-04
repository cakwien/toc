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
        $q=mysqli_query($con,"select * from u_soal join u_opsi on u_soal.id_soal = u_opsi.id_soal where id_soal = $id");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function insert($con,$modul,$soal)
    {
        mysqli_query($con,"insert into u_soal values('','$modul','$soal')");
    }

    function jumlahsoal($con,$idmodul)
    {
        $q=mysqli_query($con,"Select * from u_soal where id_modul = '$idmodul'");
        $dt=mysqli_num_rows($q);
        return $dt;
    }

    function hapus($con,$idsoal)
    {
        $q=mysqli_query($con,"delete from u_soal where id_soal = '$idsoal'");
        if($q)
        {
            $q=mysqli_query($con,"delete from u_opsi where id_soal = '$idsoal'");
            if($q)
            {
                header('location:?p=soal&hapus=ok');
            }else
            {
                header('location:?p=soal&hapus=fail');
            }
        }
    }
}
?>