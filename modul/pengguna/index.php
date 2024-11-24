<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna - Retail Application</title>
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Pengguna</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Password</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $query = "SELECT id, username, nama_lengkap, password, level FROM users";
                $result = $mysqli->query($query);

                if ($result->num_rows > 0) {
                    $id_baru = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$id_baru}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['nama_lengkap']}</td>
                                <td>******</td>
                                <td>{$row['level']}</td>
                              </tr>";
                              $id_baru++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data pengguna.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>