<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Retail Application</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .profile-header {
        background-color: #3b5998;
        height: 300px;
        position: relative;
        color: white;
    }

    .profile-header img.cover-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-bottom: 3px solid #fff;
    }

    .profile-info {
        position: absolute;
        bottom: 20px;
        left: 20px;
        display: flex;
        align-items: center;
    }

    .profile-info img.profile-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid white;
        margin-right: 20px;
    }

    .profile-info h1 {
        font-size: 32px;
        margin: 0;
    }

    .profile-bio {
        background: white;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .profile-bio h2 {
        font-size: 24px;
        margin-bottom: 15px;
    }

    .profile-bio p {
        font-size: 16px;
        color: #333;
    }

    .profile-nav {
        background: #fff;
        display: flex;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .profile-nav a {
        padding: 15px;
        text-decoration: none;
        color: #3b5998;
        font-size: 18px;
        text-align: center;
        flex: 1;
        border-right: 1px solid #ddd;
    }

    .profile-nav a:last-child {
        border-right: none;
    }

    .profile-nav a:hover {
        background-color: #f0f0f0;
    }

    .profile-posts {
        margin-top: 30px;
    }

    .post {
        background: white;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .post h3 {
        font-size: 22px;
        margin-bottom: 10px;
    }

    .post p {
        font-size: 16px;
        color: #333;
    }

    .logout-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 20px;
        font-size: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .logout-container a {
        text-align: center;
        justify-content: center;
        color: red;
        text-decoration: none;
        font-size: 20px;
    }
    </style>
</head>

<body>
    <?php
        include 'koneksi.php';

        $query = "SELECT username FROM users";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nama_lengkap = $row['username'];
            }
        }
    ?>

    <div class="container">
        <div class="profile-header">
            <img src="wpp1.jpg" class="cover-photo" alt="Cover Photo">
            <div class="profile-info">
                <img src="pp2.png" class="profile-photo" alt="Profile Photo">
                <h1><?= $_SESSION['user']; ?></h1>
            </div>
        </div>

        <div class="profile-nav">
            <a href="#">Halaman Utama</a>
        </div>

        <div class="profile-bio">
            <h2>Bio</h2>
            <p>Halo! Saya seorang profesional yang bersemangat dalam dunia retail, dengan pengalaman yang mendalam dalam
                menyediakan produk berkualitas untuk setiap pelanggan. Sebagai admin yang selalu siap membantu, saya
                pastikan setiap transaksi berjalan lancar dan memuaskan. Di balik setiap produk, ada komitmen kuat untuk
                memberikan pengalaman terbaik, karena bagi saya, kepuasan pelanggan adalah prioritas utama. Terima kasih
                telah mempercayakan kami sebagai pilihan Anda. Mari terus berkembang bersama!</p>
        </div>
    </div>

    <div class="logout-container">
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>