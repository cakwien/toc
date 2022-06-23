<?php
if(!empty($_GET['p']))
{
    $p = strtolower($_GET['p']);

    if($p=="login")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password))
        {
            $user->login($con,$username,$password);
        }
        
        include('view/login.php');
    }

    elseif($p=="modul")
    {
        include('view/index.php');
    }

    elseif($p=="soal")
    {
        include('view/index.php');
    }

    elseif($p=="insoal")
    {
        include('view/index.php');
    }

    

   
}
else
{
    include('view/index.php');
}

?>