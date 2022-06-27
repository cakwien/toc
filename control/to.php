<?php

if(!empty($_GET['p']))
{
    $p = $_GET['p'];

    if($p=="login")
    {
        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $in = $peserta->login($con,$_POST['email'],$_POST['password']);
        }
        include('view/login.php');
    }

    elseif($p=="logout")
    {
        session_start();
        session_destroy();
        header('location:?p=login');
    }

    elseif($p=="jadwal")
    {
        include('view/index.php');
    }

    elseif($p=="pre")
    {
        include('view/index.php');
    }

    elseif($p=="soal")
    {
        include('view/index.php');
    }

    elseif($p=="hasil")
    {
        include('view/index.php');
    }

    

    else
    {
        include('view/index.php');
    }
}else
{
    include('view/index.php');
}

?>