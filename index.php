<?php

session_start();
include "connection.php";

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <!-- Header -->
    <?php include "header.php"; ?>
    <!-- Header -->

    <div class="container">

        <!-- Search -->
        <form action="shop.php" method="GET" class="row">
            <div class="col-4 offset-3 mt-4">
                <div class="form-floating">
                    <input type="text" class="form-control" name="search" placeholder="Search..." />
                    <label for="search">Search</label>
                </div>
            </div>
            <div class="col-2 mt-4 d-grid">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </form>
        <!-- Search -->

        <div class="row">
            <div class="col-12 mt-4">
                <img src="asset/img/banner.webp" class="rounded" width="100%" alt="">
            </div>
        </div>

        <div class="row my-5">

            <?php

            $rs = Database::search(" SELECT * FROM `stock_view` ORDER BY `stock_view`.`stock_id` DESC LIMIT 8 ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $row = $rs->fetch_assoc();
            ?>

                <div class="col-12 col-md-4 col-lg-3 my-3">
                    <div class="card">
                        <a href="single-product-view.php?product=<?php echo ($row['stock_id']); ?>" class="text-light text-decoration-none">
                            <img src="<?php echo ($row['img']); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo ($row['name']); ?></h5>
                                <p class="card-text"><?php echo ($row['description']); ?></p>
                                <p class="card-text fs-3 fw-bold text-warning-emphasis">Rs.<?php echo ($row['price']); ?>.00</p>
                            </div>
                        </a>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>

        <!-- Footer -->
        <div class="container-fluid bg-body-secondary py-3">

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

    </div>

    <script src="script.js"></script>
</body>

</html>