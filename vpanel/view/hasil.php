<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Hasil Tryout Peserta
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-select form-select-sm float-start select2" style="width:400px;" name="" id="">
                    <option value="?p=hasil">Semua Jadwal</option>
                    <?php
                    foreach ($jadwal->all($con) as $row) {
                        echo '<option ' . sel($_GET['jadwal'], $row[0]) . ' value="?p=hasil&jadwal=' . $row['id_jadwal'] . '">' . $row['1'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="card-body">
                <table id="datatabel" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th>Nama</th>
                            <th>Event</th>
                            <th style="width:8%">Jml Soal</th>
                            <th style="width:8%">Terjawab</th>
                            <th style="width:8%">Benar</th>
                            <th style="width:8%">Salah </th>
                            <th style="width:8%">Nilai </th>
                            <th style="width:8%">Lama </th>
                            <th style="width:8%">Opsi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dthasil as $row) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nm_siswa'] ?></td>
                                <td><?= $row['jadwal'] ?></td>
                                <td><?= $soal->jumlahsoal($con, $row['id_modul']) ?></td>
                                <td><?= $row['jawab'] ?></td>
                                <td><?= $row['benar'] ?></td>
                                <td><?= $row['salah'] ?></td>
                                <td><?= $row['nilai'] ?></td>
                                <td></td>
                                <td>
                                    <button onclick="window.location.href='?p=analisis&jadwal=<?=$row['id_jadwal']?>&siswa=<?=$row['id_siswa']?>'" class="btn btn-primary btn-sm"><i class="bi-search"></i> Analisis</button>
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