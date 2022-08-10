<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Data Modul Tryout

                <button data-bs-toggle="modal" data-bs-target="#tbmodal" class="btn btn-primary float-end"><i class="bi-folder-plus"></i></button>
            </div>
            <div class="card-body">
                <table id="datatabel" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Modul</th>
                            <th>Jumlah Soal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($modul->modulall($con) as $row) {
                        ?>
                            <tr>
                                <td style="width:10%;"><?= $no ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $modul->jumlahsoal($con, $row[0]) ?></td>
                                <td style="width:20%;">
                                    <button class="btn btn-sm btn-success" data-id="<?= $row[0] ?>" data-bs-target="#editmodul" data-bs-toggle="modal"><i class="bi-pencil"></i></button>
                                    <?php
                                    $js = $modul->jumlahsoal($con, $row[0]);
                                    if ($js > 0) {
                                    ?>
                                        <a href="?p=modul&det=<?= $row[0] ?>" class="btn btn-sm btn-info"><i class="bi-search"></i></a>
                                        <a href="?p=modul&del=<?= $row[0] ?>" onclick="return confirm('Di dalam modul ini terdapat soal-soal,Menghapus modul ini akan menghapus soal-soal di dalamnya,Apakah anda yakin menghapus data modul ini?');" class="btn btn-sm btn-danger"><i class="bi-trash"></i></a>
                                    <?php } else { ?>
                                        <a href="?p=modul&del=<?= $row[0] ?>" onclick="return confirm('Apakah anda yakin menghapus data modul ini?');" class="btn btn-sm btn-danger"><i class="bi-trash"></i></a>
                                    <?php } ?>

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
    <div class="modal fade" id="tbmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Modul Tryout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Modul</label>
                            <input type="text" name="nmmodul" class="form-control" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="simpanmodul" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="modal fade" id="editmodul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Modul Tryout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="modal-data"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatemodul" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">
    $(document).ready(function() {
        $('#editmodul').on('show.bs.modal', function(e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type: 'post',
                url: 'view/editmodul.php',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data: 'getDetail=' + getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success: function(data) {
                    $('.modal-data').html(data);
                    /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
        });
    });
</script>