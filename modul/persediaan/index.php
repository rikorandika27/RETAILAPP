<?php
include 'koneksi.php';
include 'function.php';

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang - Retail Application</title>
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

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    .add-btn {
        background: #4CAF50;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        margin-bottom: 20px;
    }

    .add-btn:hover {
        background: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Persediaan Data Barang</h1>
        <a href="barang.php" class="add-btn">Tambah Barang Baru</a>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM barang";
                $result = $mysqli->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nama_barang']}</td>
                                <td>{$row['kategori']}</td>
                                <td>{$row['stok']}</td>
                                <td>" . formatrupiah($row['harga']) . "</td>
                                <td>
                                    <a href='edit_barang.php?id={$row['id']}'>Edit</a> | 
                                    <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus barang ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
                }

                $result->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>