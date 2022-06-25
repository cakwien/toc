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
                            <th>Start</th>
                            <th>End</th>
                            <th>Modul</th>
                            <th>Kelas</th>
                            <th>Rombel</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
                        <input type="durasi" class="form-control" style="width:100px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>