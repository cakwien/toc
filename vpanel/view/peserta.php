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
                            $no=1;
                            foreach($listpeserta as $row)
                            {                        
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$row['nm_siswa']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['nm_kelas']?></td>
                            <td><?=$row['rombel']?></td>
                        </tr>
                        <?php
                            $no++; }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>