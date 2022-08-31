<?php
// session_start();

if (empty($_SESSION['tryout'])) {
    header('location:?p=jadwal');
} else {

    if (!empty($_SESSION["waktu_start"])) {
        $lewat = time() - $_SESSION['waktu_start'];
        // $lewat = $_SESSION['waktu_start'];
        // echo $lewat;
    } else {
        $_SESSION['waktu_start'] = time();
        $lewat = 0;
    }

    if (!empty($_GET['run'])) {

        $urlbasesoal = $_GET['run'];
        $run = explode("-", base64_decode($urlbasesoal));
        $idjadwal = $run[1];
        $idmodul = $run[2];
        $idsiswa = $useraktif['id_siswa'];

        //detail jadwal
        $qjadwal = mysqli_query($con, "Select * from u_jadwal where id_jadwal = '$idjadwal'");
        $detjadwal = mysqli_fetch_array($qjadwal);

        //jumlahsoal
        $jumsoal = $soal->jumlahsoal($con, $idmodul);
        // echo $jumsoal[0];

        $qjs = mysqli_query($con, "select count(id_tempsoal) from u_tempsoal where id_jadwal = $idjadwal and id_modul = $idmodul and id_siswa = $idsiswa");
        $js = mysqli_fetch_array($qjs);
        $jumlahsoal = $js[0];
        // echo $jumlahsoal;

        //tampilkan soal berdasarkan u_tempsoal
        if (empty($_GET['n'])) {
            $qsoal = mysqli_query($con, "Select * from u_tempsoal where id_siswa = '$idsiswa' and id_jadwal = '$idjadwal' order by id_tempsoal asc limit 1");
            $dtsoal = mysqli_fetch_array($qsoal);
            $angka = "1";
            // echo $dtsoal['id_soal'];

        } else {
            $nosoal = $_GET['n'] - 1;
            $qsoal = mysqli_query($con, "Select * from u_tempsoal where id_siswa = '$idsiswa' and id_jadwal = '$idjadwal' order by id_tempsoal asc limit $nosoal , 1 ");
            $dtsoal = mysqli_fetch_array($qsoal);
            $angka = $nosoal + 1;
        }

        // cek ada jawaban atau tidak
        $idsoal = $dtsoal['id_soal'];
        $qcekjawab = mysqli_query($con, "Select * from u_jawab where id_siswa = '$idsiswa' and id_soal = '$idsoal' and id_jadwal='$idjadwal'");
        $dtcekjawab = mysqli_fetch_array($qcekjawab);

        //jawab soal
        if (!empty($_GET['ans'])) {
            $idopsi = $_GET['ans'];
            $idjawab = $dtcekjawab['id_jawab'];
            // echo "kamu menjawab";
            if (empty($dtcekjawab[0])) {
                $qpilihjawab = mysqli_query($con, "insert into u_jawab value(NULL,'$idsiswa','$idjadwal','$idsoal','$idopsi') ");
                if ($qpilihjawab) {
                    header('location:?p=soal&run=' . $urlbasesoal . '&n=' . $_GET['n']);
                }
            } else {
                // $qpilihjawab = mysqli_query($con, "update u_jawab set id_opsi = '$idopsi' where id_siswa = '$idsiswa' and id_soal = '$idsoal' and id_jadwal='$idjadwal'");
                $qpilihjawab = mysqli_query($con, "update u_jawab set id_opsi = '$idopsi' where id_jawab = $idjawab");
                if ($qpilihjawab) {
                    header('location:?p=soal&run=' . $urlbasesoal . '&n=' . $_GET['n']);
                }
            }
        }

        //kumpulkan ujian
        if (!empty($_GET['selesai'])) {
            //jumlah jawaban benar
            $qbenar = mysqli_query($con, "select * from u_jawab join u_soal on u_jawab.id_soal = u_soal.id_soal join u_opsi on u_jawab.id_opsi = u_opsi.id_opsi where u_opsi.kunci = 'benar' and id_siswa = '$idsiswa' and id_jadwal = '$idjadwal'");
            $jumlahbenar = mysqli_num_rows($qbenar);

            //jumlah terjawab
            $qterjawab = mysqli_query($con, "select * from u_jawab join u_soal on u_jawab.id_soal = u_soal.id_soal join u_opsi on u_jawab.id_opsi = u_opsi.id_opsi where id_siswa = '$idsiswa' and id_jadwal = '$idjadwal'");
            $jumlahterjawab = mysqli_num_rows($qterjawab);

            //jumlah jawaban salah
            $jumlahsalah = $jumlahsoal - $jumlahbenar;

            //hitung nilai
            $nilaisoal = 100 / $jumlahsoal;
            $nilaiakhir = $jumlahbenar * $nilaisoal;
            $waktu = time();
            $lama = $waktu - $_SESSION['waktu_start'];
            //masukkan data
            $qinputnilai = mysqli_query($con, "insert into u_hasil value(NULL,'$idsiswa','$idjadwal','$jumlahterjawab','$jumlahbenar','$jumlahsalah','$nilaiakhir','$lama')");
            if ($qinputnilai) {
                unset($_SESSION['tryout']);
                unset($_SESSION['waktu_start']);
                $qselesai = mysqli_query($con,"delete from u_testrun where id_siswa = '$idsiswa' and id_jadwal = '$idjadwal'");
                if($qselesai)
                {
                    header('location:?p=soal&run='.$urlbasesoal);
                }
            }
        }

        //next dan prev
        $next = $_GET['n'] + 1;
        $prev = $_GET['n'] - 1;
        $disprev = "";
        $disnext = "";

        if ($_GET['n'] <= 1) {
            $disprev = "disabled";
        }

        if ($_GET['n'] == $jumlahsoal) {
            $disnext = "disabled";
        }

       
    } else {
        echo "Ujian error";
        exit;
    }
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Soal Ke : <span class="fw-bold"><?= $angka ?></span>
                        <span class="bg-success ps-2 pe-2 ms-3 text-light rounded-pill" id="timer"></span>
                    </div>
                    <div class="float-end">
                        <button data-bs-toggle="modal" data-bs-target="#daftarsoal" class="btn btn-primary btn-sm">Daftar Soal</button>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    echo $soal->tpsoal($con, $dtsoal['id_soal']);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?php
                            $abjad = ['A', 'B', 'C', 'D', 'E'];
                            for ($i = 1; $i <= 5; $i++) {

                                $tampilopsi = $soal->tpopsi($con, "opsi" . $i, $dtsoal['id_soal']);
                                $jawaban = $tampilopsi['id_opsi'];
                                $n = $_GET['n'];
                                $idsoal = $dtsoal['id_soal'];

                                $qcj = mysqli_query($con, "select id_opsi from u_jawab where id_siswa = $idsiswa and id_soal = $idsoal and id_jadwal = '$idjadwal' and id_opsi = $jawaban ");
                                $dtcj = mysqli_fetch_array($qcj);
                                if (!empty($dtcj[0])) {
                                    $selectopsi = "btn-primary";
                                } else {
                                    $selectopsi = "btn-outline-primary";
                                }


                            ?>
                                <table class="mb-3">
                                    <tr>
                                        <td style="width:5%" class="align-top">
                                            <button onclick='window.location.href="?p=soal&run=<?= $urlbasesoal ?>&n=<?= $n ?>&ans=<?= $jawaban ?>"' class="btn <?= $selectopsi ?> rounded-pill btn-sm me-2"><?= $abjad[$i - 1] ?></button>
                                        </td>
                                        <td>
                                            <?= $tampilopsi['opsi']  ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        </div>
                    </div>




                </div>
                <div class="card-footer">
                    <button title="Soal Sebelumnya" onclick="window.location.href='?p=soal&run=<?= $_GET['run'] ?>&n=<?= $_GET['n'] - 1 ?>'" class="btn btn-success rounded-pill <?= $disprev ?>"><i class="bi-arrow-left-circle"></i> </button>
                    <button title="Soal Selanjutnya" onclick="window.location.href='?p=soal&run=<?= $_GET['run'] ?>&n=<?= $_GET['n'] + 1 ?>'" class="float-end btn btn-success rounded-pill <?= $disnext ?>"><i class="bi-arrow-right-circle"></i></button>
                </div>
            </div>
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="daftarsoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                for ($i = 0; $i < $jumlahsoal; $i++) {
                                ?>
                                    <button class="btn btn-outline-primary mb-1" onclick="window.location.href='?p=soal&run=<?= $_GET['run'] ?>&n=<?= $i + 1 ?>'"><?= $i + 1; ?></button>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button onclick="window.location.href='?p=soal&run=<?= $urlbasesoal ?>&selesai=ok'" class="btn btn-danger"><i class="bi-reply"></i> Kumpulkan Ujian</button>
            </div>
        </div>
    </div>
</div>




<script>
    function waktuHabis() {
        alert('waktu anda telah habis, ujian akan di tutup, semua hasil pekerjaan akan otomatis tersimpan...');
        window.location = "?p=soal&run=<?= $_GET['run'] ?>&selesai=ok";
    }

    function hampirHabis(periods) {
        if ($.countdown.periodsToSeconds(periods) <= 60) {
            $(this).removeClass("text-light");
            $(this).addClass("text-light bg-danger");
        }
    }


    $(function() {
        var waktu = <?= $detjadwal['durasi'] * 60 ?>;
        var sisa_waktu = waktu - <?= $lewat ?>;
        var longWayOff = sisa_waktu;
        $("#timer").countdown({
            until: longWayOff,
            compact: true,
            onExpiry: waktuHabis,
            onTick: hampirHabis
        });
    })
</script>