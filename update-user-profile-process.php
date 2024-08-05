<?php

include "connection.php";
session_start();

if (isset($_SESSION['user'])) {

    $uid = $_SESSION['user']['id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $no = $_POST['no'];
    $line1 = $_POST['line1'];
    $line2 = $_POST['line2'];
    $city = $_POST['city'];
    $pcode = $_POST['pcode'];

    //validation

    //Update user data
    Database::iud(" UPDATE `users` SET `fname`='$fname', `lname`='$lname', `mobile`='$mobile' WHERE `id`='$uid' ");

    //Update User address
    $rs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$uid' ");
    $num = $rs->num_rows;

    if ($num > 0) {
        //Update
        Database::iud(" UPDATE `user_address` SET `no` = '$no', `line_1` = '$line1', `line_2` = '$line2', `city`='$city',`postal_code`='$pcode' WHERE `users_id`='$uid' ");
    } else {
        //Insert
        Database::iud(" INSERT INTO `user_address` VALUES ('$uid','$no', '$line1', '$line2', '$city', '$pcode' ) ");
    }
    echo "success";
}
