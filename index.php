<?php

// error_reporting(0);


include('mod/sutep.php');
include('mod/add.php');

include('mod/peserta.php');
$peserta = new peserta;

include('mod/jadwal.php');
$jadwal = new jadwal;

include('mod/soal.php');
$soal = new soal;

include('mod/crud.php');
$crud = new Crud($con);

include('mod/ujian.php');
$ujian = new ujian;

include('mod/analisis.php');
$analisis = new analisis;



// Routing Aplikasi
include('control/to.php');

?>