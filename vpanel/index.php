<?php

include('mod/add.php');
include('mod/sutep.php');


// insert class function

include('mod/user.php');
$user = new user;

include('mod/modul.php');
$modul = new modul;

include('mod/soal.php');
$soal = new soal;

include('mod/opsi.php');
$opsi = new opsi;

include('mod/peserta.php');
$peserta = new peserta;

include('mod/kelas.php');
$kelas = new kelas;

include('mod/jadwal.php');
$jadwal = new jadwal;

include('mod/hasil.php');
$hasil = new hasil;

include('mod/ujian.php');
$ujian = new ujian;

include('control/vpanel.php');

?>