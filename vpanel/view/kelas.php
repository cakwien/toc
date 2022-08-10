<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Data Kelas

                <button data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary float-end btn-sm"><i class="bi-clipboard2-plus"></i></button>
            </div>
            <div class="card-body">
                <table id="datatabel" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kelas</th>
                            <th>Rombel</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kelas->all($con) as $row) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nm_kelas'] ?></td>
                                <td>
                                    <?php
                                    foreach ($kelas->rombelkelas($con, $row['id_kelas']) as $rom) {
                                        echo '<li>' . $rom['nm_kelas'] . ' - ' . $rom['rombel'] . ' <a class="text-danger"><i class="bi-trash"></i></a> </li>';
                                    }
                                    ?>
                                    <li><a title="Tambah Rombel" class="tbkecil bg-primary"><i class="bi-journal-plus"></i> Tambah Rombel</a></li>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"><i class="bi-search"></i></button>
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
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Jumlah Rombel</label>
                        <input type="number" min=1 value="1" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>