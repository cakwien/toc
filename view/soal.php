<?php
if (empty($_SESSION['tryout'])) {
    header('location:?p=jadwal');
} else {
    if (!empty($_GET['run'])) {
        $run = explode("-", base64_decode($_GET['run']));
        $idjadwal = $run[1];
        $idmodul = $run[2];
        // echo $idjadwal;

        //jumlahsoal
        $jumsoal = $soal->jumlahsoal($con, $idmodul);
        // echo $jumsoal[0];


        $idsiswa = $useraktif['id_siswa'];

        //tampilkan soal berdasarkan u_tempsoal
        if (empty($_GET['n'])) {
            $qsoal = mysqli_query($con, "Select * from u_tempsoal where id_siswa = '$idsiswa' and id_jadwal = '$idjadwal' order by id_tempsoal desc limit 1");
            $dtsoal = mysqli_fetch_array($qsoal);
            $angka = "1";
            // echo $dtsoal['id_soal'];
        } else {
            $number = base64_decode($_GET['n']);
            $qsoal = mysqli_query($con, "Select * from u_tempsoal where id_siswa = '$idsiswa' and id_jadwal = '$idjadwal' and id_soal = '$number'");
            $dtsoal = mysqli_fetch_array($qsoal);
            $tpno = explode("-", base64_decode($_GET['n']));
            $angka = $tpno[0];
        }

        //keterangan posisi soal
        
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
                            $abjad = ['A','B','C','D','E'];
                            for ($i = 1; $i <= 5; $i++) {

                            ?>
                                <table class="mb-3">
                                    <tr>
                                        <td style="width:5%" class="align-top">
                                            <button class="btn btn-outline-primary rounded-pill btn-sm me-2"><?=$abjad[$i-1]?></button>
                                        </td>
                                        <td>
                                            <?= $soal->tpopsi($con, "opsi" . $i, $dtsoal['id_soal']) ?> 
                                        </td>
                                    </tr>
                                </table>
                            <?php


                            }

                            ?>
                        </div>
                    </div>




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
                                $no = 1;
                                foreach ($soal->soaltempall($con, $idjadwal) as $nsoal) {
                                    $ns = base64_encode($no . "-" . $nsoal['id_soal']);
                                ?>
                                    <button class="btn btn-outline-primary mb-1" onclick="window.location.href='?p=soal&run=<?= $_GET['run'] ?>&n=<?= $ns ?>'"><?= $no ?></button>
                                <?php

                                    $no++;
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-danger"><i class="bi-reply"></i> Kumpulkan Ujian</button>
            </div>
        </div>
    </div>
</div>