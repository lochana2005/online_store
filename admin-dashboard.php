<?php
session_start();
if (isset($_SESSION["admin"])) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="logo.png">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Admin Dashboard - Online Store</title>
    </head>

    <body onload="loadChart();">
        <?php include "admin-header.php" ?>

        <div class="container admin-body">
            <div class="row">

                <div class="card d-flex justify-content-center" style="width: 100%;height: 500px;">
                    <canvas id="chart1"></canvas>
                </div>

            </div>
        </div>

        <?php include "admin-footer.php" ?>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: admin-signin.php");
}
?>