<?php
$dtsoal = $analisis->allsoalbysiswabyjadwal($con, $idjadwal, $idsiswa);
$dtjadwal = $jadwal->index($con, $idjadwal);
$dthasil = $analisis->hasil($con, $idjadwal, $idsiswa);

$qjs = mysqli_query($con,"select * from u_soal where id_modul =". $dtjadwal['id_modul']);
$js = mysqli_num_rows($qjs);

?>


<div class="container">
    <div class="row mt-2">
        <div class="col-md-6">
            <h5>Analisis Hasil Tryout</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card">

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Event</label>
                        <input type="text" class="form-control form-control-sm" value="<?=$dtjadwal['jadwal']?>" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Jumlah Soal</th>
                                    <th>Terjawab</th>
                                    <th>Benar</th>
                                    <th>Salah</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?=$js?></td>
                                    <td><?=$dthasil['jawab']?></td>
                                    <td><?=$dthasil['benar']?></td>
                                    <td><?=$dthasil['salah']?></td>
                                    <td><?=$dthasil['nilai']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                    Analisis
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%">No</th>
                                <th colspan="3">Soal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dtsoal as $row) {
                                $jwb =  $analisis->jawaban($con, $idsiswa, $_GET['jadwal'], $row['id_soal']);
                            ?>
                                <tr>
                                    <td <?php if($jwb['kunci']=='benar'){echo 'rowspan="2"';} else {echo 'rowspan="3"';} ?> ><?= $no ?></td>
                                    <td style="background-color:#EAF6F6" colspan="3"><?= $row['soal'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width:10%" class="fw-bold">Jawaban</td>
                                    <td style="width:5%" class="fw-bold text-center fs-5">
                                        <?php
                                        if ($jwb['kunci'] == 'benar') {
                                            echo '<i class="text-success bi-check-circle-fill"></i>';
                                        }else
                                        {
                                            echo '<i class="text-danger bi-x-circle-fill"></i>';
                                        }
                                        ?></td>
                                    <td class="fw-bold">
                                        <?=$jwb['opsi']?>
                                    </td>
                                </tr>
                                <?php
                                    if($jwb['kunci']=='salah')
                                    {
                                    $ob = $analisis->opsibenar($con, $row['id_soal']);
                                ?>
                                <tr>
                                    <td style="width:20%" class="fw-bold">Kunci</td>
                                    <td style="width:5%" class="fw-bold"> <?=$ob['opsi']?>  </td>
                                    <td class="fw-bold"></td>
                                </tr>
                                <?php } ?>

                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>