<?php
include('../mod/sutep.php');

if (!empty($_POST['getDetail'])) {
    $idsoal = $_POST['getDetail'];
    $qsoal = mysqli_query($con, "Select * from u_soal where id_soal = '$idsoal'");
    $dts = mysqli_fetch_array($qsoal);

    // opsibenar
    $qopsibenar = mysqli_query($con, "select * from u_opsi where id_soal = $dts[0] and kunci = 'benar'");
    $dtopsibenar = mysqli_fetch_array($qopsibenar);

    // opsisalah
    $qopsisalah = mysqli_query($con, "select * from u_opsi where id_soal = $dts[0] and kunci = 'salah'");
    
}
?>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Soal</label>
            <textarea name="soal" id="summernotesoal" cols="30" rows="10"><?= $dts['soal'] ?></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="">Opsi Benar</label>
            <textarea name="opsi" id="summernotebenar" cols="30" rows="10"><?= $dtopsibenar['opsi'] ?></textarea>
            <input type="hidden" name="idopsibenar" value="<?= $dtopsibenar['id_opsi'] ?>">
        </div>

        <?php
            $n=1;
            while($opsisalah = mysqli_fetch_array($qopsisalah)){
        ?>
        <div class="form-group mt-2">
            <label for="">Opsi <?=$n?></label>
            <textarea name="opsisalah<?=$n?>" id="summernote<?=$n?>" cols="30" rows="10"><?=$opsisalah['opsi']?></textarea>
        </div>
        <?php $n++; } ?>
       
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote1').summernote();
        $('#summernote2').summernote();
        $('#summernote3').summernote();
        $('#summernote4').summernote();
        $('#summernote5').summernote();
        $('#summernotebenar').summernote();
        $('#summernotesoal').summernote();
    });
</script>