<?php
class opsi{
    function insert($con,$soal,$opsi,$kunci)
    {
        mysqli_query($con,"insert into u_opsi values(NULL,'$soal','$opsi','$kunci')");
    }

    function opsibenarbysoal($con,$soal)
    {
        $q=mysqli_query($con,"Select * from u_opsi where id_soal = '$soal' and kunci = 'benar'");
        $dt = mysqli_fetch_array($q);
        return $dt['opsi'];
    }
}
?>