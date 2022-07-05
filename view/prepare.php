<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h5>Persiapan Mengerjakan...</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Detail
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            Nama Modul
                        </div>
                        <div class="col-md-5 fw-bold">
                            : <?= $dtjadwalkerjakan['jadwal'] ?>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            Jumlah Soal
                        </div>
                        <div class="col-md-5 fw-bold">
                            : <?= $dtjs['jumlah'] ?> Butir
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            Jenis Soal
                        </div>
                        <div class="col-md-5 fw-bold">
                            : Pilihan Ganda
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            Waktu Pengerjaan
                        </div>
                        <div class="col-md-5 fw-bold">
                            : <?= $dtjadwalkerjakan['durasi'] ?> Menit
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button onclick="window.location.href='?p=pre&batal=<?= $useraktif['id_siswa'] ?>&jadwal=<?= $dtjadwalkerjakan['id_jadwal'] ?>'" class="btn btn-danger">Batal</button>
                    <?php
                        $kerjakan = $useraktif['id_siswa'] ."-". $dtjadwalkerjakan['id_jadwal']."-".$dtjadwalkerjakan['id_modul'];
                        echo $dtjadwalkerjakan['id_modul'];
                    ?>
                    <button onclick="window.location.href='?p=pre&kerjakan=<?=base64_encode($kerjakan)?>'" class=" btn btn-primary">Kerjakan</button>
                </div>
            </div>
        </div>
    </div>
</div>