<?php
include('../mod/sutep.php');
include('../mod/add.php');


// if (!empty($_POST['getDetail'])) {
//     $id = $_POST['getDetail'];
// }

?>

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