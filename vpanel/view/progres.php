<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Progress Peserta

                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-select form-select-sm float-start select2" style="width:400px;" name="" id="">
                    <option value="?p=progres">Semua Jadwal</option>
                    <?php
                    foreach ($jadwal->all($con) as $row) {
                        echo '<option ' . sel($_GET['jadwal'], $row[0]) . ' value="?p=progres&jadwal=' . $row['id_jadwal'] . '">' . $row['1'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover" id="datatabel">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Peserta</th>
                            <th>Jadwal</th>
                            <th>Start</th>
                            <th>Progress</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($listprogress as $row) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nm_siswa'] ?></td>
                                <td><?= $row['jadwal'] ?></td>
                                <td><?= tgl($row[3]) . " - " . date('H:i:s', $row[3]) ?></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="bi-trash"></i></button>
                                    <button class="btn btn-primary btn-sm"><i class="bi-search"></i></button>
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