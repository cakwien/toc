<?php

    if(!empty($_GET['p']))
    {
        switch ($_GET['p']) {
            case "login";
                require_once('view/login.php');
                break;
            case "jadwal";
                require_once('view/jadwal.php');
                break;
            case "pre";
                require_once('view/prepare.php');
                break;
            case "soal";
                require_once('view/soal.php');
                break;
            case "hasil";
                require_once('view/hasil.php');
                break;
            case "analisis";
                require_once('view/analisis.php');
                break;
            case "grafik";
                require_once('view/grafik.php');
                break;
            case "bio";
                require_once('view/bio.php');
                break;





            default:
                require_once('view/home.php');
        }
    }
    else
    {
        require_once('view/home.php');
    }
    

?>