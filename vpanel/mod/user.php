<?php
class user{
    function login($con,$username,$password)
    {
        $q=mysqli_query($con,"select * from admin where username = '$username' and password = '$password'");
        $dt = mysqli_fetch_array($q);

        if(!empty($dt[0]))
        {
            session_start();
            $_SESSION['username'] = $username;
            header('location:../');
        }
    }
    
}
?>