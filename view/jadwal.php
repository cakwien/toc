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
                                        <span class="text-light bg-success ps-1 pe-1 rounded txtkecil"><?= tgl($row['time_start']) . " - " . date('H:i', $row['time_start']) ?></span>
                                        <br>
                                        <span class="text-light bg-danger ps-1 pe-1 rounded txtkecil"><?= tgl($row['time_end']) . " - " . date('H:i', $row['time_end']) ?></span>
                                    </td>
                                    <td><?= $row['jadwal'] ?></td>
                                    <td><?= $soal->jumlahsoal($con, $row['id_modul']) ?></td>
                                    <td><?= $row['durasi'] ?> Menit  <?=$ujian->cekhasil($con,$idsiswa,$row['id_jadwal'])?></td>
                                    <td>

                                        <?php
                                        $idjadwal = $row['id_jadwal'];
                                        $ch = $ujian->cekhasil($con, $idsiswa, $row['id_jadwal']);
                                        if ($ch == "belum") {

                                            $qcektempsoal = mysqli_query($con, "select * from u_tempsoal where id_siswa = '$idsiswa' and id_jadwal = $idjadwal");
                                            $dtcektempsoal = mysqli_num_rows($qcektempsoal);

                                            if ($dtcektempsoal < 1) {
                                                if ($now > $row['time_end']) {
                                                    echo '<button class="btn btn-sm btn-danger disabled">Terlambat</button>';
                                                } else {
                                                    echo '<a class="btn btn-sm btn-primary" href="?p=pre&siswa=' . $idsiswa . '&jadwal=' . $row['id_jadwal'] . '&modul=' . $row['id_modul'] . '">Mulai</a>';
                                                }
                                            }else
                                            {
                                                if ($now > $row['time_end']) {
                                                    echo '<button class="btn btn-sm btn-success disabled">Selesai</button>';
                                                } else {
                                                    echo '<a class="btn btn-sm btn-primary" href="?p=pre&siswa=' . $idsiswa . '&jadwal=' . $row['id_jadwal'] . '&modul=' . $row['id_modul'] . '">Lanjutkan</a>';
                                                }
                                            }
                                        }else
                                        {
                                            echo '<span class="btn btn-sm btn-success disabled"><i class="bi-check-circle"></i></span>';
                                        }
                                        ?>
                                        <!-- <a href="?p=pre&siswa=<?= $useraktif['id_siswa'] ?>&jadwal=<?= $row['id_jadwal'] ?>&modul=<?= $row['id_modul'] ?>">Mulai</a>
 -->

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