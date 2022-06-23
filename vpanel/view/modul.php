
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Data Modul Tryout

                <button data-bs-toggle="modal" data-bs-target="#tbmodal" class="btn btn-primary btn-sm float-end">Tambah</button>
            </div>
            <div class="card-body">
                <table id="datatabel" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Modul</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <?php
                        $no=1;
                        foreach($modul->modulall($con) as $row)
                        {
                    ?>
                    <tbody>
                        <tr>
                            <td style="width:10%;"><?=$no?></td>
                            <td><?=$row[1]?></td>
                            <td style="width:20%;">
                                <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php $no++; } ?>

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
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>