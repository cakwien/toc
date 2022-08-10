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
                            <th>Modul</th>
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
                                <td><?= $row['modul'] ?></td>
                                <td style="width:40%;"><?= $row['soal'] ?></td>
                                <td><?= $opsi->opsibenarbysoal($con, $row[0]) ?></td>
                                <td style="width:20%">
                                    <a href="#detailsoal" data-id="<?= $row['id_soal'] ?>" data-bs-toggle="modal" data-bs-target="#detailsoal" class="tbkecil bg-primary"><i class="bi-search"></i></a>
                                    <a href="#editsoal" data-id="<?= $row['id_soal'] ?>" data-bs-toggle="modal" data-bs-target="#editsoal" class="tbkecil bg-success"><i class="bi-pencil-square"></i></a>
                                    <a href="?p=soal&del=<?= $row['id_soal'] ?>" class="tbkecil bg-danger"><i class="bi-trash"></i></a>
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

<div class="row">
    <div class="modal fade" id="detailsoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-data"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="modal fade" id="editsoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="modal-data1"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatesoal" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#detailsoal').on('show.bs.modal', function(e) {
            var getDetail = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'post',
                url: 'view/detsoal.php',
                data: 'getDetail=' + getDetail,
                success: function(data) {
                    $('.modal-data').html(data);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#editsoal').on('show.bs.modal', function(e) {
            var getDetail = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'post',
                url: 'view/editsoal.php',
                data: 'getDetail=' + getDetail,
                success: function(data) {
                    $('.modal-data1').html(data);
                }
            });
        });
    });
</script>