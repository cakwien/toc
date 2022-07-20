<?php

if (!empty($_GET['p'])) {
    $p = $_GET['p'];
    $now = time();

    if ($p == "login") {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $in = $peserta->login($con, $_POST['email'], $_POST['password']);
        }
        include('view/login.php');
    } elseif ($p == "logout") {
        session_start();
        session_destroy();
        header('location:?p=login');
    } elseif ($p == "jadwal") {
        //limit jadwal

        $btkerjakan = '<button class="btn btn-sm btn-primary"><i class="bi-pencil"></i> Kerjakan</button>';
        $btselesai = '<button class="btn btn-sm btn-success"><i class="bi-check"></i> Selesai</button>';
        $btterlambat = '<button class="btn btn-sm btn-secondary" disabled><i class="bi-check"></i> Selesai</button>';
        $btlanjut = '<button class="btn btn-sm btn-warning"><i class="bi-arrow-down-right-circle-fill"></i> Lanjutkan</button>';



        include('view/index.php');
    } elseif ($p == "pre") {

        if (!empty($_GET['siswa']) && !empty($_GET['modul'] && !empty($_GET['jadwal']))) {
            $id_modul = $_GET['modul'];
            $id_siswa = $_GET['siswa'];
            $id_jadwal = $_GET['jadwal'];

            //cek temp soal
            $qcektempsoal = mysqli_query($con, "select * from u_tempsoal where id_siswa = '$id_siswa' and id_jadwal = '$id_jadwal' and id_modul = '$id_modul'");
            $dtcektempsoal = mysqli_num_rows($qcektempsoal);

            if ($dtcektempsoal > 0) {
                header('location:?p=pre&jadwal=' . base64_encode($id_jadwal));
            } else {
                //masukkan data acak soal ke table u_tempsoal
                $carisoal = mysqli_query($con, "select * from u_soal where id_modul = $id_modul order by rand()");
                while ($dtcs = mysqli_fetch_array($carisoal)) {
                    $dtcssoal = $dtcs['id_soal'];
                    $qopsi = mysqli_query($con, "Select * from u_opsi where id_soal = '$dtcssoal' order by rand()");
                    $opsiarray = array();
                    while ($dtopsi = mysqli_fetch_array($qopsi)) {
                        $opsiarray[] = $dtopsi;
                    }

                    $opsi1 = $opsiarray[0]['id_opsi'];
                    $opsi2 = $opsiarray[1]['id_opsi'];
                    $opsi3 = $opsiarray[2]['id_opsi'];
                    $opsi4 = $opsiarray[3]['id_opsi'];
                    $opsi5 = $opsiarray[4]['id_opsi'];

                    $qtempsoal = mysqli_query($con, "insert into u_tempsoal value('','$id_siswa','$id_jadwal','$id_modul','$dtcssoal','$opsi1','$opsi2','$opsi3','$opsi4','$opsi5')");

                    if ($qtempsoal) {
                        header('location:?p=pre&jadwal=' . base64_encode($id_jadwal));
                    } else {
                        header('location:?p=jadwal');
                    }

                    // mysqli_query($con,"insert into u_tempsoal values('','$id_siswa','$id_modul','$dtcssoal','$')")
                }
            }
        }

        if (!empty($_GET['batal']) && !empty($_GET['jadwal'])) {
            $qbatal = mysqli_query($con, "delete from u_tempsoal where id_siswa =" . $_GET['batal'] . " and id_jadwal = " . $_GET['jadwal']);
            if ($qbatal) {
                header('location:?p=jadwal');
            } else {
                header('location:?p=pre&jd=' . base64_encode($_GET['jadwal']));
            }
        }

        if (!empty($_GET['kerjakan'])) {
            $kerjakan = explode("-", base64_decode($_GET['kerjakan'])); //siswa-jadwal
            $start = time();
            $jd = $kerjakan[1];
            $sis = $kerjakan[0];

            //cek apakah tryout pernah di lakukan apa belum
            $qtestrun = mysqli_query($con, "select * from u_testrun where id_siswa = '$sis' and id_jadwal = $jd limit 1 ");
            // $dttestrun1 = mysqli_num_rows($qtestrun);
            $dttestrun = mysqli_fetch_array($qtestrun);

            if (!empty($dttestrun['start'])) {
                session_start();
                $_SESSION['tryout'] = $_GET['kerjakan'];
                $_SESSION['waktu_start'] = $dttestrun['start'];
                // $_SESSION['waktu_start'] = time();
                $getrun = base64_encode("tryout-" . $kerjakan[1] . "-" . $kerjakan[2]); //tryout-idjadwal-idmodul
                mysqli_query($con,"update u_testrun set start ='$start' where id_siswa = '$sis' and id_jadwal = '$jd'");
                header('location:?p=soal&run=' . $getrun . '&n=1'); // isinya idjadwal dan idmodul
            } else {
                $q = mysqli_query($con, "insert into u_testrun values('','$kerjakan[0]','$kerjakan[1]','$start','')");
                if ($q) {
                    session_start();
                    $_SESSION['tryout'] = $_GET['kerjakan'];
                    $_SESSION['waktu_start'] = time();
                    $getrun = base64_encode("tryout-" . $kerjakan[1] . "-" . $kerjakan[2]); //tryout-idjadwal-idmodul
                    header('location:?p=soal&run=' . $getrun . '&n=1'); // isinya idjadwal dan idmodul
                } else {
                    echo '<script>alert("gagal memulai ujian")</script>';
                }
            }
        }
        $qjadwalkerjakan = mysqli_query($con, "select * from u_jadwal where id_jadwal = " . base64_decode($_GET['jadwal']));
        $dtjadwalkerjakan = mysqli_fetch_array($qjadwalkerjakan);

        // jumlahsoal
        $qjs = mysqli_query($con, "select count(id_soal) as jumlah from u_soal where id_modul = " . $dtjadwalkerjakan['id_modul']);
        $dtjs = mysqli_fetch_array($qjs);


        include('view/index.php');
    } elseif ($p == "soal") {

        include('view/index.php');
    } elseif ($p == "hasil") {


        include('view/index.php');
    } 
    elseif($p=="analisis")
    {
        if(!empty($_GET['jadwal']))
        {
            $idjadwal = $_GET['jadwal'];
        }
        
        
        include('view/index.php');
    }

    elseif($p=="grafik")
    {
        include('view/index.php');
    }

    elseif($p=="bio")
    {
        include('view/index.php');
    }
    
    else {
        include('view/index.php');
    }
} else {
    include('view/index.php');
}
