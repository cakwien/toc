<?php

    include('../mod/sutep.php');
    include('../mod/add.php');

    $qrombel = mysqli_query($con,"select * from rombel join kelas on rombel.id_kelas = kelas.id_kelas");


    if(!empty($_POST['getDetail']))
    {
        $q=mysqli_query($con,"Select * from siswa join kelas_siswa on siswa.id_siswa = kelas_siswa.id_siswa join rombel on kelas_siswa.id_rombel = rombel.id_rombel join kelas on rombel.id_kelas = kelas.id_kelas where siswa.id_siswa = '".$_POST['getDetail']."'");
        $dt=mysqli_fetch_array($q);

        

        
    }

?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?=$dt['nm_siswa']?>">
            <input type="hidden" name="id" class="form-control" value="<?=$dt['id_siswa']?>">
        </div>
        <div class="form-group mt-2">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?=$dt['alamat']?>">
        </div>
        <div class="form-group mt-2">
            <label for="">Tempat, Tgl Lahir</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="tplahir" class="form-control" value="<?=$dt['tp_lahir']?>">
                </div>
                <div class="col-md-6">
                    <input type="date" name="tgllahir" class="form-control" value="<?=$dt['tgl_lahir']?>">
                </div>
            </div>
        </div>
        <div class="form-group mt-2">
            <label for="">Asal Sekolah</label>
            <input type="text" name="asalsekolah" class="form-control" value="<?=$dt['asal_sekolah']?>">
        </div>
        <div class="form-group mt-2">
            <label for="">No HP</label>
            <input type="text" name="nohp" class="form-control" value="<?=$dt['no_hp']?>">
        </div>
        <div class="form-group mt-2">
            <label for="">Kelas</label>
            <select name="rombel" class="form-select" >
            <?php 
                while($row=mysqli_fetch_array($qrombel))
                {
            ?>

                <option value="<?=$row['id_rombel']?>" <?=sel($row['id_rombel'],$dt['id_rombel'])?> > <?=$row['nm_kelas']." - ".$row['rombel']?></option>

            <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="<?=$dt['email']?>">
        </div>
        <div class="form-group mt-2">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" value="<?=$dt['password']?>">
            <input type="hidden" class="form-control" name="pass" value="<?=$dt['password']?>">
        </div>
    </div>
</div>