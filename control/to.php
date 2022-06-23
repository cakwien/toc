<?php

if(!empty($_GET['p']))
{
    $p = $_GET['p'];

    if($p=="login")
    {
        include('view/login.php');
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







    elseif($p=="login")
    {
        include('login.php');
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