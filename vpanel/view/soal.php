<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-start">Data Soal &nbsp; &nbsp;</div>
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-select form-select-sm float-start select2" style="width:400px;" name="" id="">
                    <option value="?p=soal">Semua Modul</option>
                    <?php
                    foreach ($modul->modulall($con) as $row) {
                        echo '<option ' . sel($_GET['modul'], $row[0]) . ' value="?p=soal&modul=' . $row[0] . '">' . $row['1'] . '</option>';
                    }
                    ?>
                </select>

                <?php
                if (!empty($_GET['modul'])) {
                ?>
                    <button onclick="window.location.href='?p=insoal&modul=<?= $_GET['modul'] ?>'" class="btn btn-primary btn-sm float-end">Tambah Soal</button>
                <?php } ?>

            </div>

            <div class="card-body">
                <table id="datatabel" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Soal</th>
                            <th>Jawaban</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;



                        foreach ($listsoal as $row) {
                        ?>
                            <tr>
                                <td style="width:10%;"><?= $no ?></td>
                                <td style="width:40%;"><?= $row['soal'] ?></td>
                                <td><?= $opsi->opsibenarbysoal($con, $row[0]) ?></td>
                                <td style="width:20%">
                                    <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                    <a href="#" class="btn btn-sm btn-success">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
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