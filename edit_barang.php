<?php
include 'koneksi.php';
include 'function.php';

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama_barang = $_POST['nama_barang'];
        $kategori = $_POST['kategori'];
        $stok = intval($_POST['stok']);
        $harga = floatval($_POST['harga']);

        $stmt = $mysqli->prepare("UPDATE barang SET nama_barang = ?, kategori = ?, stok = ?, harga = ? WHERE id = ?");
        $stmt->bind_param("ssidi", $nama_barang, $kategori, $stok, $harga, $id);

        if ($stmt->execute()) {
            header("Location: /retailapp/dashboard.php?modul=persediaan&status=edited");
            exit();
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        $stmt = $mysqli->prepare("SELECT * FROM barang WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "<p>Data barang tidak ditemukan!</p>";
            echo '<a href="/retailapp/dashboard.php?modul=persediaan">Kembali ke Persediaan Barang</a>';
            exit();
        }

        $stmt->close();
    }
} else {
    echo "<p>ID Salah!</p>";
    echo '<a href="/retailapp/dashboard.php?modul=persediaan">Kembali ke Persediaan Barang</a>';
    exit();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Retail Application</title>
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
                height="30px" ;></a>
        <h1>Edit Barang</h1>
        <form action="edit_barang.php?id=<?= $id ?>" method="POST">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($row['nama_barang']) ?>"
                required>

            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" value="<?= htmlspecialchars($row['kategori']) ?>" required>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="<?= htmlspecialchars($row['stok']) ?>" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" step="0.01" value="<?= htmlspecialchars($row['harga']) ?>"
                required>

            <button type="submit">Simpan Perubahan</button>
        </form>
        <br>
    </div>
</body>

</html>