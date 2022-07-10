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
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <table id="datatabel" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Waktu</th>
                                <th>Jumlah Soal</th>
                                <th>Terjawab</th>
                                <th>Benar</th>
                                <th>Salah</th>
                                <th>Nilai</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($dthasil as $row) {
                                $idjadwal = $row['id_jadwal'];
                            ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$row['jadwal']?></td>
                                    <td><?=tgl($row['time_start'])?></td>
                                    <td><?=$ujian->jumlahjawab($con, $idsiswa, $row['id_jadwal'])?></td>
                                    <td><?=$row['jawab']?></td>
                                    <td><?=$row['benar']?></td>
                                    <td><?=$row['salah']?></td>
                                    <td><?=$row['nilai']?></td>
                                    <td>
                                        <button onclick='window.location.href="?p=analisis&jadwal=<?=$idjadwal?>"' class="btn btn-sm btn-primary"><i class="bi-search"></i></button>
                                    </td>
                                </tr>
                            <?php $no++; } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>