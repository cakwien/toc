<div class="container">
    <div class="row mt-2">
        <h5>Jadwal TryOut</h5>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="datatabel">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Waktu</th>
                                <th>Event</th>
                                <th>Jumlah Soal</th>
                                <th>Durasi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($jadwal->jadwalaktifbyrombel($con, $useraktif['id_rombel']) as $row) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <span class="text-light bg-success ps-1 pe-1 rounded"><?= tgl($row['time_start']) . " - " . date('H:i', $row['time_start']) ?></span>
                                        <br>
                                        <span class="text-light bg-danger ps-1 pe-1 rounded"><?= tgl($row['time_end']) . " - " . date('H:i', $row['time_end']) ?></span>
                                    </td>
                                    <td><?= $row['jadwal'] ?></td>
                                    <td><?= $soal->jumlahsoal($con, $row['id_modul']) ?></td>
                                    <td><?= $row['durasi'] ?> Menit</td>
                                    <td>
                                     <a href="?p=pre&siswa=<?=$useraktif['id_siswa']?>&jadwal=<?=$row['id_jadwal']?>&modul=<?=$row['id_modul']?>">Mulai</a>
                                        <!-- <button class="btn btn-sm btn-primary"><i class="bi-pencil"></i> Kerjakan</button> -->
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
