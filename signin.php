<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Signin - Online Store</title>
</head>

<body>

    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">

            <!-- Sign In box -->
            <div class="col-10 col-lg-4 growshrink1-3" id="signin">

                <div class="row card">
                    <div class="card-body">

                        <div class="col-12">
                            <h2 class="text-center">Sign In</h2>
                        </div>

                        <?php

                        $email = "";
                        $password = "";

                        if (isset($_COOKIE["email"])) {
                            $email = $_COOKIE["email"];
                        }
                        if (isset($_COOKIE["password"])) {
                            $password = $_COOKIE["password"];
                        }
                        ?>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="email" name="" id="em" class="form-control" value="<?php echo $email ?>">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="" id="pw" class="form-control" value="<?php echo $password ?>">
                        </div>

                        <div class="col-12 mb-3">
                            <input type="checkbox" name="" id="rmb" class="form-check-input" <?php if (isset($_COOKIE["email"])) echo ("checked") ?>>
                            <label for="rmb" class="form-label">Remember Me</label>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn btn-secondary" onclick="signin();">SIGN IN</button>
                        </div>

                        <div class="text-center mb-3">
                            <a href="forgot-password.php" class="link-secondary text-decoration-none">Forgot Password?</a>
                        </div>

                        <div class="text-center">
                            <a class="link-secondary text-decoration-none" onclick="changeview();">Don't have an account? Sign Up</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Sign In box -->

            <!-- Sign Up box -->
            <div class="d-none col-10 col-lg-4 growshrink1-3" id="signup">

                <div class="row card">
                    <div class="card-body">

                        <div class="col-12">
                            <h2 class="text-center">Sign Up</h2>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">First Name</label>
                                <input id="fname" type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Last Name</label>
                                <input id="lname" type="text" name="" id="" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Mobile</label>
                            <input id="mobile" type="text" name="" id="" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input id="email" type="email" name="" id="" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Password</label>
                            <input id="password" type="password" name="" id="" class="form-control">
                        </div>

                        <div id="errorMsgDiv2" class="d-none">
                            <div class="alert alert-danger" id="errorMsg2"></div>
                        </div>

                        <div class="d-grid mb-3">
                            <button onclick="signup();" class="btn btn-secondary">SIGN UP</button>
                        </div>

                        <div class="text-center">
                            <a class="link-secondary text-decoration-none" onclick="changeview();">Already have an account? Sign In</a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>