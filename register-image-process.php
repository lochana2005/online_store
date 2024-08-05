<?php
include "connection.php";

$name = $_POST['name'];
$desc = $_POST['desc'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$color = $_POST['color'];
$size = $_POST['size'];

if (empty($name)) {
    echo ("Please enter the product name");
} else if (empty($desc)) {
    echo ("Please enter the product description");
} else if (empty($_FILES['img'])) {
    echo ("Please select a product image");
} elseif (empty($category)) {
    echo ("Please select a category");
} else if (empty($brand)) {
    echo ("Please select a brand");
} else if (empty($color)) {
    echo ("Please select a color");
} else if (empty($size)) {
    echo ("Please select a size");
} else {

    $rs = Database::search(" SELECT * FROM  `product` WHERE `name` = '$name' AND `brand_id` = '$brand' AND `size_id` = '$size' AND `cat_id` = '$category' AND `color_id` = '$color' ");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Product Already Exists");
    } else {

        $imgPath = "asset/products/" . uniqid() . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $imgPath);

        Database::iud(" INSERT INTO `product` (`name`, `description`, `img`, `cat_id`, `brand_id`, `color_id`, `size_id`) VALUES ('$name', '$desc', '$imgPath', '$category', '$brand', '$color', '$size') ");

        echo ("success");
    }
}
