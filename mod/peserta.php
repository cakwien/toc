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
        $q=mysqli_query($con,"select * from siswa where email = '$email'");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }
}
?>