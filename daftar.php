<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retail - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-secondary-subtle">
    <div class="container d-flex vh-100 align-items-center justify-content-center">
        <div class="card w-25 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Retail Application - Register</h4>
                <hr>
                <?php
                session_start();
                if (isset($_SESSION['pesan'])) {
                    echo "<div class='text-center text-danger fs-6'>".$_SESSION['pesan']."</div>";
                    session_unset();
                }
                ?>
                <form action="register.php" method="POST">
                    <div class="mb-2">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" name="username"
                            placeholder="(Tanpa spasi, capslock dan angka)" required />
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama_lengkap"
                            placeholder="(Dengan spasi, capslock dan angka)" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="(angka)" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="level">Level (admin/user)</label>
                        <input class="form-control" type="text" name="level" placeholder="(admin/user)" required />
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary py-3">Daftar</button>
                    </div>
                </form>
                <hr>
                <div class="d-grid gap-2" style="height: 50px;">
                    <p style="text-align: center; color : green; margin-bottom: 0px;">Sudah punya akun?</p>
                    <a href="login.php" style="text-align: center;">Login</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>