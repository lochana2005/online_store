<?php
include "connection.php";

$product = $_POST["product"];
$qty = $_POST["qty"];
$price = $_POST["price"];

if ($product == "0") {
    echo ("Please select a product");
} else if (empty($qty)) {
    echo ("Please enter a quantity");
} else if ($qty < 1 || !is_numeric($qty)) {
    echo ("Invalid quantity");
} else if (empty($price)) {
    echo ("Please enter a price");
} else if ($price < 1 || !is_numeric($price)) {
    echo ("Invalid unit price");
} else {

    $rs = Database::search(" SELECT * FROM `stock` WHERE `product_id` ='$product' AND `price` ='$price' ");
    $num = $rs->num_rows;

    if ($num > 0) {
        $row = $rs->fetch_assoc();

        $newQty = $row['qty'] + $qty;
        Database::iud(" UPDATE `stock` SET `qty` = '$newQty' WHERE `id` = '" . $row['id'] . "' ");
    } else {
        Database::iud(" INSERT INTO `stock` (`product_id`, `qty`, `price`) VALUES ('$product', '$qty', '$price') ");
    }

    echo ("success");
}
