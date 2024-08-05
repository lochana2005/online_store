<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Online Store</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">

            <div class="col-10 col-lg-4 growshrink1-3">

                <div class="row card">
                    <div class="card-body">

                        <div class="col-12">
                            <h2 class="text-center">Forgot Password</h2>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="email" name="" id="email" class="form-control" ">
                        </div>

                        <div class=" d-grid mb-3">
                            <button class="btn btn-secondary" onclick="forgotPassword();">
                                <div class="spinner-border d-none" role="status" id="loader">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <span id="btnText">SEND</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>