<?php
include "connection.php";
session_start();

$user = $_SESSION['user'];
$userId = $user['id'];

$error = "";

$stockList = [];
$qtyList = [];

if (isset($_POST['cart']) && $_POST['cart'] == "true") {

    $rs = Database::search(" SELECT * FROM `cart` WHERE `users_id` = '$userId' ");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $row = $rs->fetch_assoc();

        $stockList[] = $row['stock_id'];
        $qtyList[] = $row['qty'];
    }
} else {

    $stockList[] = $_POST["stockId"];
    $qtyList[] = $_POST["qty"];
}

$merchantId = "1224052";
$merchantSecret = "MzU2ODM5ODI2ODEyNDYwNTIzOTEzMjc3MDQzNzM0MjAyODcxMDkwNg==";
$items = [];
$netTotal = 0;
$currency = "LKR";
$orderId = uniqid();

for ($x = 0; $x < sizeof($stockList); $x++) {
    $stockRs = Database::search(" SELECT * FROM `stock_view` WHERE `stock_id` = '" . $stockList[$x] . "' ");
    $stock =  $stockRs->fetch_assoc();

    $stockQty = $stock['qty'];
    if ($stockQty >= $qtyList[$x]) {
        $items[] = $stock['name'];
        $netTotal += intval($stock['price']) * intval($qtyList[$x]);
    } else {
        $error = "Insufficient Quantity";
    }
}

$netTotal += 500;

$hash = strtoupper(
    md5(
        $merchantId .
            $orderId .
            number_format($netTotal, 2, '.', '') .
            $currency .
            strtoupper(md5($merchantSecret))
    )
);

$payment = [];

$payment["sandbox"] = true;
$payment["merchant_id"] = $merchantId;
$payment["return_url"] = "http://localhost/onlinestore";
$payment["cancel_url"] = "http://localhost/onlinestore";
$payment["notify_url"] = "http://localhost/onlinestore/notify";
$payment["order_id"] = $orderId;
$payment["items"] = implode(", ", $items);
$payment["amount"] = number_format($netTotal, 2, '.', '');
$payment["currency"] = $currency;
$payment["hash"] = $hash;
$payment["first_name"] = $user["fname"];
$payment["last_name"] = $user["lname"];
$payment["email"] = $user["email"];
$payment["phone"] = $user["mobile"];

$addressRs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$userId'");
$num = $addressRs->num_rows;

if ($num > 0) {
    $address = $addressRs->fetch_assoc();
    $payment["address"] = $address['line_1'] . " " . $address['line_2'];
    $payment['city'] = $address['city'];
    $payment['country'] = "Sri Lanka";
} else {
    $error = "Please Update Your Address";
}

$json = [];
if (empty($error)) {
    $json['status'] = "success";
    $json['payment'] = $payment;
} else {
    $json['status'] = "error";
    $json['error'] = $error;
}

echo json_encode($json);
