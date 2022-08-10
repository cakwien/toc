<?php
if (!empty($_GET['p'])) {
    $p = strtolower($_GET['p']);

    if ($p == "login") {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = $user->login($con, $username, $password);
        }

        include('view/login.php');
    } elseif ($p == "logout") {
        session_start();
        session_destroy();
        header('location:?p=login');

    } elseif ($p == "modul") {

        if (isset($_POST['simpanmodul'])) {
            $nmmodul = $_POST['nmmodul'];
            $input = $modul->insert($con, $nmmodul);
        }

        if (!empty($_GET['del'])) {
            $modul->delete($con, $_GET['del']);
        }

        if (isset($_POST['updatemodul'])) {
            $update = $modul->update($con, $_POST['modul'], $_POST['id']);
        }

        include('view/index.php');
    } elseif ($p == "soal") {
        // select soal berdasarkan modul yang dipilih
        if (!empty($_GET['modul'])) {
            $listsoal = $soal->soalbymodul($con, $_GET['modul']);
        } else {
            $listsoal = $soal->all($con);
        }


        if (!empty($_GET['del'])) {
            $soal->hapus($con, $_GET['del']);
        }

        include('view/index.php');
    } elseif ($p == "peserta") {
        if (!empty($_GET['kelas'])) {
            $listpeserta = $peserta->allbykelas($con, $_GET['kelas']);
        } else {
            $listpeserta = $peserta->all($con);
        }


        if (isset($_POST['inputpeserta'])) {
            if ($_POST['password1'] == $_POST['password2']) {

                $qcekemail = mysqli_query($con,"Select * from siswa where email = '".$_POST['email']."'");
                $dtcekemail = mysqli_fetch_array($qcekemail);

                if(!empty($dtcekemail[0]))
                {
                    echo '<script>window.alert("email sudah pernah terdaftar");</script>';
                }
                else
                {
                    $nama = $_POST['nama'];
                    $asalsekolah = $_POST['asalsekolah'];
                    $alamat = $_POST['alamat'];
                    $tplahir = $_POST['tplahir'];
                    $tgllahir = $_POST['tgllahir'];
                    $nohp = $_POST['nohp'];
                    $email = $_POST['email'];
                    $password = $_POST['password2'];

                    $qinsiswa = mysqli_query($con, "insert into siswa values('','$nama','$alamat','$tplahir','$tgllahir','$nohp','$email','$asalsekolah','',md5('$password'))");

                    // $input = $peserta->input($con, $_POST['nama'], $_POST['alamat'], $_POST['tplahir'], $_POST['tgllahir'], $_POST['nohp'], $_POST['email'], $_POST['asalsekolah'], $_POST['password2']);

                    if ($qinsiswa) {
                        $q = mysqli_query($con, "Select * from siswa where nm_siswa ='" . $_POST['nama'] . "' and email = '" . $_POST['email'] . "'");
                        $dt1 = mysqli_fetch_array($q);

                        $qinputrombel = mysqli_query($con, "insert into kelas_siswa value('','" . $dt1['id_siswa'] . "','99','" . $_POST['rombel'] . "','0','0','1')");
                        if ($qinputrombel) {
                            header('location:?p=peserta&input=' . $dt1['id_siswa']);
                        } else {
                            header('location:?p=peserta&input=fail');
                        }
                    } else
                    {
                        header('location:?p=peserta&input=fail');
                    }
                }

                
            } else {
                header('location:?p=peserta&input=passdiff');
            }
        }

        if (isset($_POST['updatepeserta'])) {
            $nama = $_POST['nama'];
            $asalsekolah = $_POST['asalsekolah'];
            $alamat = $_POST['alamat'];
            $tplahir = $_POST['tplahir'];
            $tgllahir = $_POST['tgllahir'];
            $nohp = $_POST['nohp'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rombel = $_POST['rombel'];

            if ($password == $_POST['pass']) {
                $q = mysqli_query($con, "update siswa set nm_siswa = '$nama',asal_sekolah='$asalsekolah',alamat='$alamat',tp_lahir='$tplahir',tgl_lahir='$tgllahir',no_hp='$nohp',email='$email' where id_siswa='" . $_POST['id'] . "'");

                if ($q) {
                    header('location:?p=peserta&update=ok');
                } else {
                    header('location:?p=peserta&update=fail');
                }
            } else {
                $q = mysqli_query($con, "update siswa set nm_siswa = '$nama',asal_sekolah='$asalsekolah',alamat='$alamat',tp_lahir='$tplahir',tgl_lahir='$tgllahir',no_hp='$nohp',email='$email', password=md5('$password') where id_siswa='" . $_POST['id'] . "'");
                if ($q) {
                    header('location:?p=peserta&updatepass=ok');
                } else {
                    header('location:?p=peserta&updatepass=fail');
                }
            }
        }

        if (!empty($_GET['del'])) {
            $q1 = mysqli_query($con, "delete from siswa where id_siswa = '" . $_GET['del'] . "'");
            if ($q1) {
                $q2 = mysqli_query($con, "delete from kelas_siswa where id_siswa = '" . $_GET['del'] . "'");
                if ($q2) {
                    header('location:?p=peserta');
                } else {
                    header('location:?p=peserta&hapus=fail');
                }
            } else {
                header('location:?p=peserta&hapus=fail');
            }
        }

        include('view/index.php');

    } elseif ($p == "jadwal") {
        if (isset($_POST['simpanjadwal'])) {
            $idrombel = $_POST['rombel'];
            $start = strtotime($_POST['start']);
            $end = strtotime($_POST['end']);

            foreach ($idrombel as $rb) {
                $input = $jadwal->insert($con, $_POST['jadwal'], $_POST['modul'], $rb, $start, $end, $_POST['durasi']);
            }
        }


        include('view/index.php');
    } elseif ($p == "insoal") {

        if (isset($_POST['simpansoal'])) {
            $insoal = $_POST['soal'];
            $idmodul = $_GET['modul'];
            $opsi1 = $_POST['opsibenar'];
            $kunci = "benar";
            $q = mysqli_query($con, "insert into u_soal value('','$idmodul','$insoal')");
            if ($q) {
                $qsoal = mysqli_query($con, "select * from u_soal where soal = '$insoal' and id_modul = '$idmodul' ");
                $dtqsoal = mysqli_fetch_array($qsoal);

                $idsoal = $dtqsoal[0];

                if (!empty($dtqsoal[0])) {
                    $inputopsi = mysqli_query($con, "insert into u_opsi values('','$idsoal','$opsi1','benar')");
                    if ($inputopsi) {
                        $opsisalah = $_POST['opsisalah'];
                        foreach ($opsisalah as $opsalah) {
                            mysqli_query($con, "insert into u_opsi values('','$idsoal','$opsalah','salah')");
                        }
                    }
                }

                header('location:?p=soal&modul=' . $idmodul . '&msg=soalok');
            }
        }

        include('view/index.php');
    } elseif ($p == "progres") {
        if (!empty($_GET['jadwal'])) {
            $listprogress = $ujian->progressbyjadwal($con, $_GET['jadwal']);
        } else {
            $listprogress = $ujian->progress($con);
        }

        include('view/index.php');
    } elseif ($p == "hasil") {
        if (empty($_GET['jadwal'])) {
            $dthasil = $hasil->all($con);
        } else {
            $dthasil = $hasil->allbyjadwal($con, $_GET['jadwal']);
        }


        include('view/index.php');
    } elseif ($p == "analisis") {
        if (!empty($_GET['jadwal']) && !empty($_GET['siswa'])) {
            $jd = $jadwal->index($con, $_GET['jadwal']);
            $dthasil = $hasil->index($con, $_GET['siswa'], $_GET['jadwal']);
            $dtjawaban = $hasil->jawaban2($con, $_GET['siswa'], $_GET['jadwal']);
            $jumsoal = $soal->jumlahsoal($con, $jd['id_modul']);
        }

        include('view/index.php');
    }
    elseif($p=="kelas")
    {
        include('view/index.php');
    }
} else {
    include('view/index.php');
}
