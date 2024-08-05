<?php

include "connection.php";
session_start();

if (!isset($_SESSION['user']) || !isset($_GET['id'])) {
    header("Location: index.php");
}

$user = $_SESSION['user'];
$ohId = $_GET['id'];

$ohRs = Database::search(" SELECT * FROM `order_history` WHERE `id`='$ohId' ");
$num = $ohRs->num_rows;

if ($num < 1) {
    header("Location: index.php");
}

$oh = $ohRs->fetch_assoc();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include "header.php"; ?>

    <div class="container mt-2 mb-4">

        <div class="row d-flex justify-content-center">

            <div class="col-10 offset-1 text-end my-3">
                <button onclick="printReport();" class="btn btn-danger">PRINT</button>
            </div>

            <div class="col-10 offset-1 card bg-dark-subtle shadow-sm" id="printArea">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12">
                            <h1 class="fs-1 fw-bold">INVOICE #<?php echo $oh['order_id'] ?></h1>
                            <p><span class="fw-bold">DATE:</span><?php echo $oh['order_date'] ?></p>
                        </div>

                        <div class="col-6">
                            <p class="m-0 p-0 mt-3 fs-5 fw-bold">Online Store Pvt Ltd</p>
                            <p class="m-0 p-0">No 100</p>
                            <p class="m-0 p-0">Colombo road,</p>
                            <p class="m-0 p-0">Kandy.</p>
                        </div>

                        <div class="col-6 text-end">
                            <p class="m-0 p-0 mt-3 fs-5 fw-bold"><?php echo $user['fname'] ?> <?php echo $user['lname'] ?></p>
                            <p class="m-0 p-0">No 500</p>
                            <p class="m-0 p-0">Kuliyapitiya road,</p>
                            <p class="m-0 p-0">Kurunegala.</p>
                        </div>

                        <div class="col-12 mt-4">
                            <table class="table table-striped table-hover table-secondary">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $oiRs = Database::search(" SELECT `order_item`.`price`, `order_item`.`qty`, `stock_view`.`name` FROM `order_item` JOIN `stock_view` ON `order_item`.`stock_id` = `stock_view`.`stock_id`  WHERE `oh_id`='$ohId' ");
                                    
                                    $total = 0;
                                    while ($oi = $oiRs->fetch_assoc()) {
                                        $total += $oi['price'] * $oi['qty'];
                                    ?>
                                        <tr>
                                            <td><?php echo $oi['name']; ?></td>
                                            <td>Rs.<?php echo $oi['price']; ?>.00</td>
                                            <td><?php echo $oi['qty']; ?></td>
                                            <td>Rs.<?php echo $oi['qty'] * $oi['price']; ?>.00</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-6">
                            <h3>Thank You...</h3>
                        </div>
                        <div class="col-6 text-end">
                            <div>
                                <span class="fw-bold fs-5">Sub Total:</span>
                                <span>Rs. <?php echo $total; ?>.00</span>
                            </div>
                            <div>
                                <span class="fw-bold fs-5">Delivery:</span>
                                <span>Rs. 500.00</span>
                            </div>
                            <div>
                                <span class="fw-bold fs-4">Net Total:</span>
                                <span class="fs-4">Rs. <?php echo $oh['amount'] ?>.00</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>