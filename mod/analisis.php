<?php
class analisis{
    function allsoalbysiswabyjadwal($con,$idjadwal,$idsiswa)
    {
        $list=array();
        $q = mysqli_query($con,"select * from u_tempsoal join u_soal on u_tempsoal.id_soal = u_soal.id_soal where id_jadwal = $idjadwal and id_siswa = $idsiswa;");
        while($dt=mysqli_fetch_array($q))
        {
            $list[] = $dt;
        }
        return $list;
    }

    function allopsibysoal($con,$idsoal)
    {
        $list = array();
        $q = mysqli_query($con, "select * from u_opsi where id_soal = '$idsoal'");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function jawaban($con,$idsiswa,$idjadwal,$idsoal)
    {
        $q=mysqli_query($con,"select * from u_jawab join u_opsi on u_jawab.id_opsi = u_opsi.id_opsi where id_siswa = '$idsiswa' and id_jadwal = '$idjadwal' and u_jawab.id_soal = '$idsoal' order by id_jawab limit 1");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function opsibenar($con,$idsoal)
    {
        $q=mysqli_query($con,"Select opsi from u_jawab join u_opsi on u_jawab.id_opsi = u_opsi.id_opsi where u_jawab.id_soal = '$idsoal' and kunci = 'benar'  limit 1");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function index($con,$idopsi)
    {
        $q = mysqli_query($con, "Select kunci from u_opsi where id_opsi = $idopsi ");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function hasil($con, $idjadwal, $idsiswa)
    {
        $q = mysqli_query($con, "select * from u_hasil join u_jadwal on u_hasil.id_jadwal = u_jadwal.id_jadwal where u_hasil.id_jadwal = $idjadwal and id_siswa = $idsiswa");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }
   
}
?>