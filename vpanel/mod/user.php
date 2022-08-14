<?php
class user{
    function login($con,$username,$password)
    {
        $q = mysqli_query($con, "select * from admin where username = '$username' and password = md5('$password')");
        $dt = mysqli_fetch_array($q);
        if (!empty($dt[0])) {
            session_start();
            $_SESSION['admintoc'] = $username;
            header('location:../vpanel');
        } else {
            echo '<script>window.alert("username dan password salah"); window.location.href="?p=login";</script>';
        }
    }
    
    function index($con,$admin)
    {
        $q=mysqli_query($con,"Select * from admin where username = '$admin'");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }
}
?>