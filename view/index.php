<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:?p=login');
} else {
    $useraktif = $peserta->detail($con, $_SESSION['email']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="tambah.css">

    <link rel="stylesheet" href="bi\font\bootstrap-icons.css">





    <style>
        .txtkecilbgt {
            font-size: x-small;
        }

        .txtkecil {
            font-size: small;
        }
    </style>
    <title>OsingCourse Ujian</title>
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tryout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hasil</a>
                    </li>
                </ul>
            </div>
            <div class="btn-group float-end" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person"></i>
                        <?= $useraktif['email'] ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                        <li><a class="dropdown-item fw-bold text-danger" href="?p=logout">Logout</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>