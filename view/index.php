<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:?p=login');
} else {
    $useraktif = $peserta->detail($con, $_SESSION['email']);
    $idsiswa = $useraktif['id_siswa'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="tambah.css">
    <link rel="stylesheet" href="bi\font\bootstrap-icons.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/countdown/js/jquery.plugin.min.js"></script>
    <script src="js/countdown/js/jquery.countdown.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .txtkecilbgt {
            font-size: x-small;
        }

        .txtkecil {
            font-size: small;
        }
    </style>
    <title>OsingCourse TryOut</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#243A73">
        <div class="container">
            <a class="navbar-brand" href="#">Osing Course</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../toc">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=jadwal">Tryout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=hasil">Hasil</a>
                    </li>
                </ul>
            </div>
            <div class="btn-group float-end" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person"></i>
                        <?= $useraktif['email'] ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="#"> <i class="bi-gear"></i> Setting</a></li>
                        <li><a class="dropdown-item fw-bold text-danger" href="?p=logout"> <i class="bi-box-arrow-right
"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENT WITH CONTAINER -->

    <?php
    include('mod/paging.php');
    ?>

    <!-- /CONTENT WITH CONTAINER -->
    <script>
        $(document).ready(function() {
            $('#datatabel').DataTable({
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ baris",
                    "zeroRecords": "<span class='text-danger'>Data tidak ditemukan...</span>",
                    "info": "Tampilan hal. _PAGE_ dari _PAGES_",
                    "infoEmpty": "<b class='text-danger'>Tidak ada data...</b>",
                    "infoFiltered": "(disaring dari <strong>_MAX_</strong> data keseluruhan)",
                    "sSearch": "Cari : ",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>