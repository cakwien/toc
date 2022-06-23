<?php

// $p=$_GET['p'];

if(!empty($p))
{
   if($p=="soal")   {    require_once('view/soal.php');   }
   elseif($p=="insoal")   {    require_once('view/insertsoal.php');   }
   elseif($p=="modul")   {    require_once('view/modul.php');   }
}
else
{
    require_once('view/dash.php');
}

?>