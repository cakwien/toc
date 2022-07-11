<?php
class hasil{
    function all($con)
    {
        $list = array();
        $q = mysqli_query($con, "Select * from u_hasil join u_jadwal on u_hasil.id_jadwal = u_jadwal.id_jadwal join siswa on u_hasil.id_siswa = siswa.id_siswa ");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function allbyjadwal($con,$idjadwal)
    {
        $list = array();
        $q = mysqli_query($con, "Select * from u_hasil join u_jadwal on u_hasil.id_jadwal = u_jadwal.id_jadwal join siswa on u_hasil.id_siswa = siswa.id_siswa where u_hasil.id_jadwal = '$idjadwal' ");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function index($con,$idsiswa,$idjadwal)
    {
        $q=mysqli_query($con,"select * from u_hasil join siswa on u_hasil.id_siswa = siswa.id_siswa where u_hasil.id_siswa='$idsiswa' and id_jadwal = '$idjadwal'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function jawaban($con,$idsiswa,$idjadwal)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_jawab join u_soal on u_jawab.id_soal = u_soal.id_soal join u_opsi on u_jawab.id_opsi = u_opsi.id_opsi where u_jawab.id_siswa = '$idsiswa' and u_jawab.id_jadwal = '$idjadwal' ");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function jawaban2($con,$idsiswa,$idjadwal)
    {
        $list=array();
        $q=mysqli_query($con,"select * from u_tempsoal join u_soal on u_tempsoal.id_soal = u_soal.id_soal join u_jawab on u_tempsoal.id_soal = u_jawab.id_soal join u_opsi on u_jawab.id_opsi = u_opsi.id_opsi where u_tempsoal.id_siswa = '$idsiswa' and u_tempsoal.id_jadwal = '$idjadwal'");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function cekbenar($con,$idopsi)
    {
        $q=mysqli_query($con,"Select kunci from u_opsi where id_opsi = $idopsi");
        $dt=mysqli_fetch_array($q);
        if($dt[0]=="benar")
        {
            echo '<i class="bi-check-circle-fill text-success"></i>';
        }else
        {
            echo '<i class="bi-check-x-fill text-danger"></i>';
        }

    }

    function kuncibenar($con,$idsoal)
    {
        $q=mysqli_query($con,"Select opsi from u_opsi where id_soal = $idsoal and kunci = 'benar'");
        $dt = mysqli_fetch_array($q);
        return $dt[0];
    }

    



}
?>