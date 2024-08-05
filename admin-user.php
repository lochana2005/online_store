<?php
session_start();

if (isset($_SESSION["admin"])) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>User Management - Online Store</title>
    </head>

    <body onload="loadUsers(1);">
        <!-- Admin header -->
        <?php include "admin-header.php" ?>
        <!-- Admin header -->

        <div class="container admin-body">
            <div class="row d-flex justify-content-center">

                <div class="col-10 mt-5">
                    <h2 class="text-center">User Management</h2>

                    <div class="mt-4 table-responsive" id="content">

                    </div>

                </div>

            </div>
        </div>

        <!-- Admin footer -->
        <?php include "admin-footer.php" ?>
        <!-- Admin footer -->

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:admin-signin.php");
}
?>