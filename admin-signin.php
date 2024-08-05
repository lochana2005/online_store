<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin | Online Store</title>
</head>

<body>

<div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">

            <!-- Sign In box -->
            <div class="col-10 col-lg-4 growshrink1-3">

                <div class="row card">
                    <div class="card-body">

                        <div class="col-12">
                            <h2 class="text-center">Admin Sign In</h2>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="email" name="" id="email" class="form-control" >
                        </div>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="" id="password" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <input type="checkbox" name="" id="rmb" class="form-check-input">
                            <label for="rmb" class="form-label">Remember Me</label>
                        </div>

                        <div id="msgDiv" class="d-none">
                            <div class="alert alert-danger" id="msg"></div>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn btn-secondary" onclick="adminSignIn();">SIGN IN</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>