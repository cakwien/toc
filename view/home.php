<div class="container">
    <div class="row mt-3 ">
        <h5>Selamat datang, <span class="text-primary"><?= $useraktif['nm_siswa'] ?></span> - <span class="text-success">( <?= $useraktif['nm_kelas'] . "-" . $useraktif['rombel'] ?> )</span></h5>
    </div>

    <div class="row mt-2">
        <div class="col-md-3 mt-1">
            <div class="card text-light shadow" style="background-color:#04293A">
                <div class="card-body">
                    <h2><i class="bi-calendar-event"></i> <?=$jadwal->jumlahjadwal($con,$useraktif['id_rombel'])?></h2>
                    <label for="" class="float-end">Event Tryout</label>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-1">
            <div class="card text-light shadow" style="background-color:#18978F">
                <div class="card-body">
                    <h2> <i class="bi-pencil-square"></i> <?=$jadwal->jumlahtryoutselesai($con, $idsiswa)?></h2>
                    <label for="" class="float-end">Tryout Selesai</label>
                </div>
            </div>
        </div>
    </div>
</div>