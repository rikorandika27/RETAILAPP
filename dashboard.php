<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:index.php');
}else{
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retail - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    #navbarNavAltMarkup a:hover {
        color: green;
    }

    nav {
        position: fixed;
    }
    </style>
</head>

<body class="bg-secondary-subtle">
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Retail Application</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="?modul=home"><i
                            class="bi bi-house-door-fill"></i> Home</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="?modul=barang" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-backpack4-fill"></i>
                            Barang
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?modul=barang"><i class="bi bi-bar-chart-line-fill"></i>
                                    Data Barang</a></li>
                            <li><a class="dropdown-item" href="?modul=persediaan"><i class="bi bi-align-start"></i>
                                    Persediaan Barang</a></li>
                        </ul>
                    </li>
                    <a class="nav-link" href="?modul=penjualan"><i class="bi bi-receipt-cutoff"></i> Penjualan</a>
                    <a class="nav-link" href="?modul=pengguna"><i class="bi bi-people-fill"></i> Pengguna</a>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle"></i> <?= $_SESSION['user']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?modul=profile"><i class="bi bi-person"></i> Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i>
                                    Logout</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    <main class="bg-white py-4 shadow-sm">
        <div class="container">
            <?php
            if(!isset($_GET['modul'])){
                include "home.php";
            }else{
                $modul = $_GET['modul'];
                if($modul=="home"){
                    include "home.php";
                }elseif($modul=="barang"){
                    include "modul/barang/index.php";
                }elseif($modul=="persediaan"){
                    include "modul/persediaan/index.php";
                }elseif($modul=="penjualan"){
                    include "modul/penjualan/index.php";
                }elseif($modul=="pengguna"){
                    include "modul/pengguna/index.php";
                }elseif($modul=="profile"){
                    include "modul/profile/index.php";
                }else{
                    include "home.php";
                }
            }
            ?>
        </div>
    </main>
    <div class="container py-3 text-center">
        <span>Copyright &copy; 2024 | Retail Application by Riko Randika</span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvprcYFtY31HB60NNkmXc5sgfDVZLEsAA55ND2oxhy9GkcIdsIk1eN7N6jIeHZ" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
}
?>