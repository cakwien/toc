<?php
class peserta{
    function all($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from siswa join kelas_siswa on siswa.id_siswa = kelas_siswa.id_siswa join rombel on kelas_siswa.id_rombel = rombel.id_rombel join kelas on rombel.id_kelas = kelas.id_kelas");
        while($dt = mysqli_fetch_array($q))
        {
            $list[] = $dt;
        }
        return $list;
    }

    function index($con,$id_siswa)
    {
        $q=mysqli_query($con, "select * from siswa join kelas_siswa on siswa.id_siswa = kelas_siswa.id_siswa join rombel on kelas_siswa.id_rombel = rombel.id_rombel join kelas on rombel.id_kelas = kelas.id_kelas where siswa.id_siswa = '$id_siswa'");
        $dt = mysqli_fetch_array($q);
        return $dt;

    }

    function allbykelas($con,$id_kelas)
    {
        $list = array();
        $q = mysqli_query($con, "select * from siswa join kelas_siswa on siswa.id_siswa = kelas_siswa.id_siswa join rombel on kelas_siswa.id_rombel = rombel.id_rombel join kelas on rombel.id_kelas = kelas.id_kelas where kelas.id_kelas = '$id_kelas'");
        while ($dt = mysqli_fetch_array($q)) {
            $list[] = $dt;
        }
        return $list;
    }

    function input($con,$nm_siswa,$alamat,$tp_lahir,$tgl_lahir,$no_hp,$email,$asal_sekolah,$foto,$password)
    {
        $q=mysqli_query($con,"insert into siswa values('','$nm_siswa','$alamat','$tp_lahir','$tgl_lahir','$no_hp','$email','$asal_sekolah','$foto',md5('$password'))");
        if($q)
        {
            header('location:?p=peserta&insert=ok');
        }else
        {
            header('location:?p=peserta&insert=fail');
        }
    }
}
?>