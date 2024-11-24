<?php
include 'koneksi.php';
include 'function.php';

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $mysqli->prepare("DELETE FROM barang WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: /retailapp/dashboard.php?modul=persediaan&status=success");
        exit();
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
} else {
    echo "<p>ID Salah!</p>";
    echo '<a href="/retailapp/dashboard.php?modul=persediaan">Kembali ke Persediaan Barang</a>';
}

$mysqli->close();
?>