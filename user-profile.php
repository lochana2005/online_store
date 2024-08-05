<?php
include "connection.php";
session_start();

if (isset($_SESSION['user'])) {

    $uid = $_SESSION['user']['id'];
    $rs = Database::search(" SELECT * FROM `users` WHERE `id`='$uid' ");

    if ($rs->num_rows < 1) {
        header("Location: signin.php");
    }

    $user = $rs->fetch_assoc();

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
        <title>User Profile - Online Store</title>
    </head>

    <body>

        <!-- Header -->
        <?php include "header.php"; ?>
        <!-- Header -->

        <div class="container">
            <div class="row vh-100 d-flex justify-content-center align-items-center">

                <div class="col-4 text-center">
                    <?php
                    $profile = "asset/profile/default.png";
                    if (isset($user['profile']) && !empty($user['profile'])) {
                        $profile = $user['profile'];
                    }
                    ?>
                    <img src="<?php echo $profile ?>" height="200px" alt="">
                    <div class="my-3 text-start">
                        <label for="" class="form-label">Profile Image</label>
                        <input class="form-control" type="file" id="profileImg">
                    </div>
                    <div class="d-grid">
                        <button onclick="updateProfileImg();" class="btn btn-secondary">UPLOAD</button>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">

                        <div class="col-12 mb-2">
                            <h4>Personal Details</h4>
                        </div>

                        <div class="col-6 mb-2">
                            <label for="" class="form-label">First Name:</label>
                            <input id="fname" type="text" class="form-control" value="<?php echo ($user['fname']); ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="" class="form-label">Last Name:</label>
                            <input id="lname" type="text" class="form-control" value="<?php echo ($user['lname']); ?>">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Email Address</label>
                            <input disabled type="email" class="form-control" value="<?php echo ($user['email']); ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="" class="form-label">Mobile</label>
                            <input  id="mobile" type="text" class="form-control" value="<?php echo ($user['mobile']); ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <?php
                            $utId = $user['user_type_id'];
                            $userTypeRs = Database::search(" SELECT * FROM `user_type` WHERE `id`='$utId' ");
                            $userType = $userTypeRs->fetch_assoc();
                            ?>
                            <label for="" class="form-label">User Type</label>
                            <input type="text" disabled class="form-control" value="<?php echo ($userType['name']); ?>">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 mb-2 mt-4">
                            <h4>Billing Details</h4>
                        </div>

                        <?php

                        $userAddressRs = Database::search(" SELECT * FROM `user_address` WHERE `users_id`='$uid' ");

                        $no = "";
                        $line1 = "";
                        $line2 = "";
                        $city = "";
                        $postalCode = "";

                        if ($userAddressRs->num_rows > 0) {
                            $address = $userAddressRs->fetch_assoc();

                            $no = $address['no'];
                            $line1 = $address['line_1'];
                            $line2 = $address['line_2'];
                            $city = $address['city'];
                            $postalCode = $address['postal_code'];
                        }

                        ?>

                        <div class="col-3 mb-2">
                            <label for="" class="form-label">No</label>
                            <input id="no" type="text" class="form-control" value="<?php echo ($no); ?>">
                        </div>
                        <div class="col-9 mb-2">
                            <label for="" class="form-label">Address Line 1</label>
                            <input id="line1" type="text" class="form-control" value="<?php echo ($line1); ?>">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Address Line 2 (Optional)</label>
                            <input id="line2" type="text" class="form-control" value="<?php echo ($line2); ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="" class="form-label">City</label>
                            <input id="city" type="text" class="form-control" value="<?php echo ($city); ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="" class="form-label">Postal Code</label>
                            <input id="pcode" type="text" class="form-control" value="<?php echo ($postalCode); ?>">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <button onclick="updateProfile();" class="btn btn-warning w-100">UPDATE PROFILE</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </body>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    </html>
    <?php
} else {
    header("Location:signin.php");
}
?>