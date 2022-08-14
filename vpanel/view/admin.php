<div class="row">
    <div class="col-md-6">
        <form action="" method="POST">
            <div class="card">
                <div class="card-header">
                    Setting Admin
                    <input type="hidden" value="<?=$idadmin?>" name="id">
                    <?php
                    if (empty($_GET['edit'])) {
                    ?>
                        <a onclick='window.location.href="?p=admin&edit=true"' class="btn btn-sm btn-primary float-end"><i class="bi-pencil"></i></a>
                    <?php } else {
                    ?>
                        <a onclick='window.location.href="?p=admin"' class="btn btn-sm btn-danger float-end"><i class="bi-x-circle"></i></a>
                    <?php
                    }
                    ?>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Admin</label>
                        <input type="text" name="nama" value="<?= $dataadmin['nm_admin'] ?>" id="" class="form-control" <?= $ro ?>>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?= $dataadmin['username'] ?>" id="" class="form-control" <?= $ro ?>>
                    </div>
                </div>
                <?php
                    if(!empty($_GET['edit']))
                    {
                ?>
                <div class="card-footer">
                    <button type="submit" name="updateadmin" class="btn btn-success float-end"><i class="bi-save"></i> Simpan</button>
                </div>
                <?php } ?>

            </div>
        </form>
    </div>

    <div class="col-md-6">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    Password
                    <?php
                    if (empty($_GET['pass'])) {
                    ?>
                        <a onclick='window.location.href="?p=admin&pass=true"' class="btn btn-sm btn-primary float-end"><i class="bi-pencil"></i></a>
                    <?php } else {
                    ?>
                        <a onclick='window.location.href="?p=admin"' class="btn btn-sm btn-danger float-end"><i class="bi-x-circle"></i></a>
                    <?php
                    }
                    ?>
                </div>

                <?php
                if (!empty($_GET['pass'])) {
                ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input type="password" name="passwordlama" class="form-control" id="">
                            <input type="hidden" name="idpas" value="<?=$idadmin?>">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Password Baru</label>
                            <input type="password" name="passwordbaru1" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Konfirmasi Password Baru</label>
                            <input type="password" name="passwordbaru2" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="updatepass" class="btn btn-success float-end"><i class="bi-key"></i> Simpan Password</button>
                    </div>
                <?php } else {

                ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" value="<?= md5(1234567890) ?>" class="form-control" id="" readonly>
                        </div>
                    </div>

                <?php } ?>



            </div>
        </form>
    </div>
</div>