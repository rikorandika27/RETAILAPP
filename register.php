<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $query = "INSERT INTO users (username, nama_lengkap, password, level) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssss", $username, $nama_lengkap, $password, $level);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Pendaftaran berhasil! Silakan login.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['pesan'] = "Terjadi kesalahan. Silakan coba lagi.";
        header("Location: register.php");
        exit();
    }
}
?>