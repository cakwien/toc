<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5><?=$dthasil['nm_siswa']?></h5>
                <span><?=$jd['jadwal']?></span>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th><i class="bi-card-list text-primary"></i></th>
                            <th><i class="bi-pencil-fill"></i></th>
                            <th><i class="bi-check-circle-fill text-success"></i></th>
                            <th><i class="bi-x-circle-fill text-danger"></i></th>
                            <th><i class="bi-trophy-fill text-warning"></i></th>
                            <th><i class="bi-stopwatch-fill"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=$jumsoal?></td>
                            <td><?=$dthasil['jawab']?></td>
                            <td><?=$dthasil['benar']?></td>
                            <td><?=$dthasil['salah']?></td>
                            <td><?=$dthasil['nilai']?></td>
                            <td></td>
                           
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-header">
                Jawaban Hasil Tryout
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th style="width:50%">Soal</th>
                            <th colspan="2" style="width:20%">Jawaban</th>
                            <th style="width:20%">Kunci</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($dtjawaban as $j)
                        {
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$j['soal']?></td>
                            <td><?=$hasil->cekbenar($con,$j['id_opsi'])?></td>
                            <td><?=$j['opsi']?></td>
                            <td><?=$hasil->kuncibenar($con,$j['id_soal'])?></td>
                        </tr>
                        <?php $no++; } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>