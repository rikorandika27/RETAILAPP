<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persediaan - Retail Application</title>
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
        <h1>Penjualan Barang</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $query = "SELECT id, nama_barang, kategori, stok, harga FROM barang";
                $result = $mysqli->query($query);

                if ($result->num_rows > 0) {
                    $id_baru = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$id_baru}</td>
                                <td>{$row['nama_barang']}</td>
                                <td>{$row['kategori']}</td>
                                <td>{$row['stok']}</td>
                                <td>Rp." . number_format($row['harga'], 0, ',', '.') . "</td>
                              </tr>";
                        $id_baru++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>