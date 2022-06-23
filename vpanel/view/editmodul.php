


<?php

    include('../mod/sutep.php');

    if(!empty($_POST['getDetail']))
    {
        $id = $_POST['getDetail'];
        $q=mysqli_query($con,"select * from u_modul where id_modul = $id");
        $dt = mysqli_fetch_array($q);
    }
?>

<div class="form-group">
    <label for="">Nama Modul</label>
    <input type="text" name="modul" id="" value="<?=$dt[1]?>" class="form-control">
    <input type="hidden" name="id" id="" value="<?=$dt[0]?>" class="form-control">
</div>