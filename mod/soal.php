<?php

class soal{
   function jumlahsoal($con,$idmodul)
   {
    $q=mysqli_query($con,"select count(id_soal) as jumlah from u_soal where id_modul = '$idmodul'");
    $dt=mysqli_fetch_array($q);
    return $dt[0];
   }
    
}

?>