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
        //limit jadwal
        $btkerjakan = '<button class="btn btn-sm btn-primary"><i class="bi-pencil"></i> Kerjakan</button>';
        $btselesai = '<button class="btn btn-sm btn-success" disabled><i class="bi-check"></i> Selesai</button>';
        $btterlambat = '<button class="btn btn-sm btn-secondary" disabled><i class="bi-check"></i> Selesai</button>';
        $btlanjut = '<button class="btn btn-sm btn-warning"><i class="bi-arrow-down-right-circle-fill"></i> Lanjutkan</button>';
        
        
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