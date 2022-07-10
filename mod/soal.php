<?php

class soal{
   function jumlahsoal($con,$idmodul)
   {
    $q=mysqli_query($con,"select count(id_soal) as jumlah from u_soal where id_modul = '$idmodul'");
    $dt=mysqli_fetch_array($q);
    return $dt[0];
   }

   function soalpermodul($con,$idmodul)
   {
      $list=array();
      $q=mysqli_query($con,"Select * from u_soal where id_modul = '$idmodul' order by id_soal limit 1");
      while($dt = mysqli_fetch_array($q))
      {
         $list[]=$dt;
      }
      return $list;
   }

   function soaltempall($con,$idjadwal)
   {
      $list = array();
      $q = mysqli_query($con, "select * from u_tempsoal where id_jadwal = '$idjadwal' order by id_tempsoal asc ");
      while ($dt = mysqli_fetch_array($q)) {
         $list[] = $dt;
      }
      return $list;
   }

   function tpsoal($con,$idsoal)
   {
      $q=mysqli_query($con,"Select * from u_soal where id_soal = '$idsoal'");
      $dt=mysqli_fetch_array($q);
      return $dt['soal'];
   }

   function tpopsi($con,$ops,$idsoal)
   {
      $q=mysqli_query($con, "select u_opsi.id_opsi, u_opsi.opsi from u_tempsoal join u_opsi on u_tempsoal.$ops = u_opsi.id_opsi where u_tempsoal.id_soal = $idsoal");
      $dt=mysqli_fetch_array($q);
      return $dt;
   }

  

   

   
    
}

?>