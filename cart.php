<?php
include "connection.php";
session_start();

if (isset($_SESSION['user'])) {

    $userId = $_SESSION['user']['id'];

    $rs = Database::search(" SELECT * FROM `cart` WHERE `users_id` = '$userId' ");
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="asset/img/logo.png">
        <title>Cart - Online Store</title>
    </head>

    <body onload="loadCart();">
        <!-- Header -->
        <?php include "header.php"; ?>
        <!-- Header -->

        <div class="container">
            <div class="row" id="content">

            </div>
        </div>

        <!-- Footer -->
        <div class="container-fluid bg-body-secondary py-3 mt-3">

            <div class="row">
                <div class="col-12">

                    <div class="d-flex align-items-center justify-content-round">
                        <div class="">
                            <img src="asset/img/logo.png" height="150" />
                        </div>
                        <div class="">
                            <span class="fs-3 fw-bold">Online Store</span>
                            <p>&copy; 2024 Allrights Reserved</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Footer -->

        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:signin.php");
}
?>