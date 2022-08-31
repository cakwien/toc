<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Jadwal Tryout
                <button class="btn btn-primary btn-sm float-end" data-bs-target="#tbjadwal" data-bs-toggle="modal">Tambah</button>
            </div>
            <div class="card-body">
                <table id="datatabel" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jadwal</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Modul</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal->all($con) as $row) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['jadwal'] ?></td>
                                <td><?= tgl($row['time_start']) ?> - <?= date('H:i', $row['time_start']) ?></td>
                                <td><?= tgl($row['time_end']) ?> - <?= date('H:i', $row['time_end']) ?></td>
                                <td><?= $row['modul'] ?></td>
                                <td>
                                    <?php
                                    foreach ($jadwal->allrombel($con, $row['jadwal']) as $kl) {
                                        echo '<span class="bg-danger text-light p-1 rounded-pill">' . $kl['nm_kelas'] . ' - ' . $kl['rombel'] . "</span>&nbsp;";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success" data-id="<?=$row['id_jadwal']?>" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
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

<div class="modal fade" id="tbjadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Tryout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Jadwal</label>
                        <input type="text" name="jadwal" class="form-control" id="" autofocus>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Modul</label>
                        <select name="modul" class="form-select">
                            <?php
                            foreach ($modul->modulall($con) as $md) {
                            ?>
                                <option value="<?= $md[0] ?>"><?= $md[1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Kelas</label>
                        <div class="row">

                            <?php
                            foreach ($kelas->allrombel($con) as $row) {
                            ?>
                                <div class="col-md-4">
                                    <input class="form-check-input" name="rombel[]" type="checkbox" value="<?= $row['id_rombel'] ?>">
                                    <label class="form-check-label">
                                        <?= $row['nm_kelas'] ?> - <?= $row['rombel'] ?>
                                    </label>
                                </div>

                            <?php } ?>

                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Start</label>
                                <input type="datetime-local" name="start" class="form-control" id="">
                            </div>
                            <div class="col-md-6">
                                <label for="">End</label>
                                <input type="datetime-local" name="end" class="form-control" id="">
                            </div>
                        </div>

                    </div>

                    <div class="form-group mt-2">
                        <label for="">Durasi</label>
                        <input type="number" name="durasi" class="form-control" style="width:100px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="simpanjadwal" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Tryout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="modal-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="simpanjadwal" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type: 'post',
                url: 'view/editjadwal.php',
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