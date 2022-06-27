<div class="row">
    <div class="col-md-6">
        <h5>Selamat Datang Admin...</h5>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Jadwal TryOut Terbaru
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jadwal</th>
                            <th>Modul</th>
                            <th>Kelas</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Durasi</th>
                            <th>Proggress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal->all_limit($con, "5") as $jd) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $jd['jadwal'] ?></td>
                                <td><?= $jd['modul'] ?></td>
                                <td>
                                    <?php
                                    foreach ($jadwal->allrombel($con, $jd['jadwal']) as $kl) {
                                        echo '<span class="bg-danger text-light p-1 rounded">' . $kl['nm_kelas'] . ' - ' . $kl['rombel'] . "</span>&nbsp;";
                                    }
                                    ?>
                                </td>
                                <td><?= tgl($jd['time_start']) . " - " . date('H:i', $jd['time_start']) ?></td>
                                <td><?= tgl($jd['time_end']) . " - " . date('H:i', $jd['time_end']) ?></td>
                                <td><?= $jd['durasi'] ?></td>
                                <td></td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>