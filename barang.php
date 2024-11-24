<?php
require_once 'koneksi.php';
require_once 'function.php';

if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

if (isset($_POST['create'])) {
    $nama_barang = mysqli_real_escape_string($mysqli, $_POST['nama_barang']);
    $kategori = mysqli_real_escape_string($mysqli, $_POST['kategori']);
    $stok = intval($_POST['stok']);
    $harga = floatval($_POST['harga']);

    $query = "INSERT INTO barang (nama_barang, kategori, stok, harga) VALUES ('$nama_barang', '$kategori', $stok, $harga)";
    if ($mysqli->query($query)) {
        header("Location: dashboard.php?modul=persediaan&status=success");
        exit();
    } else {
        echo "<p>Error: " . $mysqli->error . "</p>";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Retail Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        padding: 20px;
    }

    h1 {
        color: #4CAF50;
    }

    form {
        background: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button {
        background: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <a href="/retailapp/dashboard.php?modul=persediaan">
            <img src="https://img.icons8.com/?size=100&id=80689&format=png&color=000000" style="width:30px"
                height="30px">
        </a>
        <h1>Tambah Barang</h1>
        <form action="barang.php" method="POST">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>

            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" placeholder="Kategori" required>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" placeholder="Stok" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" step="0.01" placeholder="Harga" required>

            <button type="submit" name="create">Tambah Data</button>
        </form>
        <br>
    </div>
</body>

</html>