<?php

include('mod/sutep.php');
include('mod/add.php');

include('mod/peserta.php');
$peserta = new peserta;

include('mod/jadwal.php');
$jadwal = new jadwal;

include('mod/soal.php');
$soal = new soal;





// Routing Aplikasi
include('control/to.php');

?>