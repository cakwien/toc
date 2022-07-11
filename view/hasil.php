<?php
$dthasil = $ujian->hasilujianallbysiswa($con, $idsiswa);
?>


<div class="container">
    <div class="row mt-2">
        <div class="col-md-6">
            <h5>Hasil Tryout</h5>
        </div>
    </div>



    <div class="row">
        <?php
        foreach ($dthasil as $row) {
            $idjadwal = $row['id_jadwal'];
        ?>
            <div class="col-md-4 mt-1">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="form-group">
                            <a style="text-decoration:none" class="fw-bold text-dark" href="?p=analisis&jadwal=<?= $row['id_jadwal'] ?>"><?= $row['jadwal'] ?></a>
                        </div>
                        <div class="form-group mt-2">
                            <table class="table table-bordered text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><i class="bi-card-list"></i></th>
                                        <th><i class="bi-pencil-square text-primary"></i></th>
                                        <th><i class="bi-check-circle-fill text-success"></i></th>
                                        <th><i class="bi-x-circle-fill text-danger"></i></th>
                                        <th><i class="bi-stopwatch-fill" style="color:navy"></i></th>
                                        <th><i class="bi-trophy-fill" style="color:orange"></i></th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold">
                                    <tr>
                                        <td><?= $soal->jumlahsoal($con, $row['id_modul']) ?></td>
                                        <td><?= $row['jawab'] ?></td>
                                        <td><?= $row['benar'] ?></td>
                                        <td><?= $row['salah'] ?></td>
                                        <td><?= $row['salah'] ?></td>
                                        <td><?= $row['nilai'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button onclick="window.location.href='?p=analisis&jadwal=<?= $row['id_jadwal'] ?>'" class="btn btn-sm btn-primary float-end"><i class="bi-search"></i> Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>




</div>