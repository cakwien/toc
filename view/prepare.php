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
                    $kerjakan = $useraktif['id_siswa'] . "-" . $dtjadwalkerjakan['id_jadwal'] . "-" . $dtjadwalkerjakan['id_modul'];

                    ?>
                    <button data-bs-toggle="modal" data-bs-target="#siap"  class=" btn btn-primary">Kerjakan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="siap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda akan memasuki mode Tryout. Penghitung waktu mundur akan otomatis berjalan sesuai dengan alokasi waktu yang di tentukan. pastikan tetap focus dalam halaman tryout. Keluar dari halaman tidak akan menghentikan waktu yang sedang berjalan...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="window.location.href='?p=pre&kerjakan=<?= base64_encode($kerjakan) ?>'" type="button" class="btn btn-primary">Mulai Mengerjakan</button>
            </div>
        </div>
    </div>
</div>