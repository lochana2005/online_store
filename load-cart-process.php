<?php

include "connection.php";
session_start();

if (isset($_SESSION['user'])) {

    $userId = $_SESSION['user']['id'];

    $rs = Database::search(" SELECT * FROM `cart` WHERE `users_id` = '$userId' ");
    $num = $rs->num_rows;
?>

    <div class="col-12 mt-4">
        <h2><i class="bi bi-cart-check-fill"></i> Shopping Cart</h2>
    </div>

    <div class="col-12">
        <div class="row">
            <?php

            $netTotal = 0;

            for ($i = 0; $i < $num; $i++) {
                $row = $rs->fetch_assoc();
                $stockId = $row['stock_id'];

                $stockRs = Database::search(" SELECT * FROM `stock_view` WHERE `stock_id` = '$stockId' ");
                $stock = $stockRs->fetch_assoc();


            ?>

                <!-- items -->
                <div class="col-12 border border-3 rounded-4 mb-2 d-flex justify-content-between align-items-center">

                    <div class="d-flex p-3">
                        <img height="150px" src="<?php echo ($stock['img']); ?>" />
                        <div class="ms-2">
                            <h4 class="text-warning fw-bold"><?php echo ($stock['name']); ?></h4>
                            <p>Color: <?php echo ($stock['color_name']); ?></p>
                            <p>Size: <?php echo ($stock['size_name']); ?></p>
                            <h5 class="fw-bold text-primary-emphasis">Rs.<?php echo ($stock['price']); ?>.00</h5>
                        </div>
                    </div>

                    <div class="d-flex gap-1">
                        <button onclick="decrementCartQty('<?php echo ($row['id']); ?>');" class="btn btn-sm btn-light rounded-pill">-</button>
                        <input id="qty-<?php echo ($row['id']); ?>" type="text" value="<?php echo ($row['qty']); ?>" disabled class="form-control form-control-sm rounded-pill text-center" style="width: 70px;">
                        <button onclick="incrementCartQty('<?php echo ($row['id']); ?>');" class="btn btn-sm btn-light rounded-pill">+</button>
                    </div>

                    <div class="">
                        <?php
                        $pTotal = $stock['price'] * $row['qty'];
                        $netTotal += $pTotal;
                        ?>
                        <h4 class="fw-bold text-success-emphasis">Rs.<?php echo $pTotal; ?>.00</h4>
                    </div>

                    <div class="">
                        <button onclick="removeFromCart('<?php echo ($row['id']); ?>');" class="btn btn-sm btn-danger rounded-pill"><i class="bi bi-trash3-fill"></i></button>
                    </div>

                </div>
                <!-- items -->
            <?php
            }
            ?>
        </div>
    </div>

    <div class="col-12">
        <hr>
    </div>

    <?php
    if ($num > 0) {
    ?>
        <div class="col-12 text-end">
            <h5>Number of Items: <span class="text-danger-emphasis fw-bold"><?php echo $num; ?></span></h5>
            <?php
            $delivery = 500;
            $netTotal += $delivery;
            ?>
            <h5>Delivery Fee: <span class="text-muted"><?php echo $delivery; ?></span></h5>
            <h3>Net Total: <span class="text-warning"><?php echo $netTotal; ?></span></h3>
            <button onclick="checkout();" class="btn btn-success">CHECKOUT</button>
        </div>
    <?php
    } else {
    ?>

    <div class="col-12 text-center">
        <h1>Cart is empty continue shopping</h1>
    </div>
    
<?php
    }
}
?>