<?php
session_start();
if(empty($_SESSION['admintoc']))
{
    header('location:?p=login');
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
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="summernote/summernote.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">



    
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="summernote/summernote.min.js"></script>

    <style>
        .tbkecil{
            border-radius: 3px;
            font-size:small;
            text-decoration: none;
            padding: 2px;
            color:white;
        }
        .tbkecil:hover{
            border-radius: 3px;
            font-size:small;
            text-decoration: none;
            padding: 2px;
            color:yellow;
        }
    </style>




    <title>TOC</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="height:40px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../vpanel">Admin Tryout Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../vpanel">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="?p=jadwal">Jadwal</a></li>
                            <li><a class="dropdown-item" href="?p=modul">Modul</a></li>
                            <li><a class="dropdown-item" href="?p=soal">Soal</a></li>
                            <li><a class="dropdown-item" href="?p=kelas">Kelas</a></li>
                            <li><a class="dropdown-item" href="?p=peserta">Peserta</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laporan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="?p=progres">Progress Peserta</a></li>
                            <li><a class="dropdown-item" href="?p=hasil">Hasil</a></li>
                            <li><a class="dropdown-item" href="#">Statistik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->

    <div class="container-fluid mt-2 mb-3">
        <?php
        include('mod/paging.php');
        ?>
    </div>

    <!-- Content -->



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

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>