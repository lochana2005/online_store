<?php

session_start();
include "connection.php";

if (!isset($_GET['product']) || empty(($_GET['product']))) {
    header("Location:index.php");
}
$stockId = $_GET['product'];


$rs = Database::search(" SELECT * FROM `stock_view` WHERE `stock_id` ='$stockId' ");
$num = $rs->num_rows;

if ($num < 1) {
?>
    <script>
        alert("Product Not Found");
        window.location = "index.php";
    </script>
<?php
}

$row = $rs->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($row['name']); ?> - Online Store</title>
    <link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- header -->
    <?php include "header.php"; ?>
    <!-- header -->

    <div class="container">
        <div class="row vh-100 d-flex align-items-center">

            <div class="col-10 offset-1">
                <div class="card shadow bg-dark-subtle rounded">
                    <div class="card-body d-flex">

                        <div class="">
                            <img height="350" class="rounded" src="<?php echo ($row['img']); ?>" />
                        </div>
                        <div class="ms-5 w-100">
                            <h3 class="fw-bold text-warning mb-1"><?php echo ($row['name']); ?></h3>
                            <p class="text-muted fs-5"><?php echo ($row['description']); ?></p>
                            <ul class="list-unstyled">
                                <li class="mb-2">Category: <?php echo ($row['cat_name']); ?></li>
                                <li class="mb-2">Brand: <?php echo ($row['brand_name']); ?></li>
                                <li class="mb-2">Size: <?php echo ($row['size_name']); ?></li>
                                <li class="mb-2">Color: <?php echo ($row['color_name']); ?></li>
                            </ul>

                            <h4 class="fw-bold text-primary-emphasis mb-3">Rs.<?php echo ($row['price']); ?>.00</h4>

                            <div class="d-flex align-items-center">
                                <input id="qty" class="form-control" style="width:100px" type="text" placeholder="Qty" />

                                <?php
                                if ($row['qty'] > 0) {
                                ?>
                                    <span class="ms-3 fw-bold text-bg-success rounded px-2 py-1"><?php echo ($row['qty']); ?> Quantities Available</span>
                                <?php
                                } else {
                                ?>
                                    <span class="ms-3 fw-bold text-bg-danger rounded px-2 py-1">Out of Stock</span>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6 d-grid">
                                    <button onclick="addToCart(<?php echo $row['stock_id'] ?>);" class="btn btn-primary fw-bold">Add to Cart</button>
                                </div>
                                <div class="col-6 d-grid">
                                    <button onclick="buyNow(<?php echo $stockId; ?>);" class="btn btn-success fw-bold">Buy Now</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class=" col-12 fixed-bottom">
        <p class="text-center">&copy; 2024 onlinestore.lk || All Rights Reserved</p>
    </div>

    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>