<?php
class peserta{
    function login($con,$username,$password)
    {
        $cek=mysqli_query($con,"select * from siswa where email = '$username' and password = md5('$password')");
        $dtcek = mysqli_fetch_array($cek);
        if(!empty($dtcek[0]))
        {
            session_start();
            $_SESSION['email'] = $username;
            header('location:../toc');
        }else
        {
            header('location:?p=login&msg=loginfailed');
        }
    }
    
    function detail($con,$email)
    {
        $q=mysqli_query($con,"select * from siswa join kelas_siswa on siswa.id_siswa = kelas_siswa.id_siswa join rombel on kelas_siswa.id_rombel = rombel.id_rombel join kelas on rombel.id_kelas = kelas.id_kelas where email = '$email'");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function input($con,$nama,$alamat,$tplahir,$tgllahir,$nohp,$email,$asalsekolah,$foto,$password)
    {
        $q=mysqli_query($con,"insert into siswa value('','$nama','$alamat','$tplahir','$tgllahir','$nohp','$asalsekolah','$foto','$password')");
        if($q)
        {
            header('location:?p=peserta&input=ok');
        }else
        {
            header('location:?p=peserta&input=fail');
        }
    }
}
?>