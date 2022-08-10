<?php

// $p=$_GET['p'];

if(!empty($p))
{
   if($p=="soal")           {    require_once('view/soal.php');         }
   elseif($p=="insoal")     {    require_once('view/insertsoal.php');   }
   elseif($p=="modul")      {    require_once('view/modul.php');        }
   elseif($p=="peserta")    {    require_once('view/peserta.php');      }
   elseif($p=="jadwal")     {    require_once('view/jadwal.php');       }
   elseif($p=="progres")    {    require_once('view/progres.php');      }
   elseif($p=="hasil")      {    require_once('view/hasil.php');        }
   elseif($p=="analisis")   {    require_once('view/analisis.php');     }
   elseif($p=="kelas")      {    require_once('view/kelas.php');        }
}
else
{
    require_once('view/dash.php');
}
 ?>