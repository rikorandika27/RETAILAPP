<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Retail Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background: #4CAF50;
        color: white;
        text-align: center;
        padding: 1rem 0;
    }

    .container {
        padding: 20px;
    }

    .stats {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .stat-box {
        background: white;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        text-align: center;
        width: 30%;
    }

    .stat-box h2 {
        color: #4CAF50;
    }

    .chart {
        margin-top: 30px;
        background: white;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <h1>Selamat Datang Retail Application</h1>
    </header>
    <div class="container">
        <div class="stats">
            <div class="stat-box">
                <h2>150</h2>
                <p>Barang Tersedia</p>
            </div>
            <div class="stat-box">
                <h2>15</h2>
                <p>Penjualan Hari Ini</p>
            </div>
            <div class="stat-box">
                <h2>8</h2>
                <p>Pengguna Aktif</p>
            </div>
        </div>
        <div class="chart">
            <div style="display: flex; gap: 10px;">
                <i class="bi bi-activity"></i>
                <h4>Statistik Penjualan Mingguan</h4>
            </div>
            <canvas id="salesChart" width="400" height="200"></canvas>
        </div>
    </div>
    <script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Penjualan (Unit)',
                data: [12, 19, 3, 5, 2, 25, 15],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>

</html>