<?php
$dthasil = $ujian->hasilujianallbysiswa($con, $idsiswa);
?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-6">
            <h5>Pencapaian</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Grafik Pencapaian TryOut
                </div>
                <div class="card-body">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        var xValues = [<?php foreach ($ujian->hasilujianbysiswa2($con, $useraktif['id_siswa']) as $row) {
                            echo "'" . $row['jadwal']."',";
                        } ?> '-'];


        var yValues = [<?php foreach ($ujian->hasilujianbysiswa2($con, $useraktif['id_siswa']) as $row) {
                            echo $row['nilai'].",";
                        } ?> '-'];

                new Chart("myChart", {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [{
                            fill: false,
                            lineTension: 0,
                            backgroundColor: "rgba(0,0,255,1.0)",
                            borderColor: "rgba(0,0,255,0.1)",
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                            
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                    max: 100
                                }
                            }],
                        }
                    }
                });
    </script>