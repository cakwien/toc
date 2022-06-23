<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="dist\css\tambah.css">
    <script src="dist\js\bootstrap.bundle.js"></script>
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
        </div>
    </nav>

    <!-- CONTENT WITH CONTAINER -->

    <?php
    include('mod/paging.php');
    ?>

    <!-- /CONTENT WITH CONTAINER -->

</body>

</html>