<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-start">Data Peserta &nbsp; &nbsp;</div>
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-select form-select-sm float-start select2" style="width:400px;" name="" id="">
                    <option value="?p=peserta">Semua Modul</option>
                    <?php
                    foreach ($kelas->all($con) as $row) {
                        echo '<option ' . sel($_GET['kelas'], $row[0]) . ' value="?p=peserta&kelas=' . $row[0] . '">' . $row['1'] . '</option>';
                    }
                    ?>
                </select>

                <button data-bs-toggle="modal" data-bs-target="#input" class="btn btn-primary float-end">Tambah</button>
            </div>
            <div class="card-body">
                <table id="datatabel" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Rombel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($listpeserta as $row) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nm_siswa'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['nm_kelas'] ?></td>
                                <td><?= $row['rombel'] ?></td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="modal fade" id="input" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Tempat Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="tplahir" class="form-control" id="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="tgllahir" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Asal Sekolah</label>
                            <input type="text" name="asalsekolah" class="form-control" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">No HP</label>
                            <input type="text" name="nohp" class="form-control" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Password</label>
                            <input type="password" name="password1" class="form-control" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Konfirmasi Password</label>
                            <input type="password" name="password" class="form-control" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="inputpeserta" class="btn btn-primary">Input</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>