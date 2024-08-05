<?php
include "connection.php";
session_start();

if (isset($_SESSION["admin"])) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap.css">
        <title>User Management - Online Store</title>
    </head>

    <body onload="loadProducts(1);">
        <!-- Admin header -->
        <?php include "admin-header.php" ?>
        <!-- Admin header -->

        <div class="container admin-body">
            <div class="row d-flex justify-content-center">

                <div class="col-10 mt-5">

                    <div class="row">
                        <div class="col-6">
                            <h2>Stock Management</h2>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#addStockModal">Add Stock</button>
                        </div>
                    </div>


                    <div class="mt-4 table-responsive" id="content">

                    </div>

                </div>

            </div>
        </div>

        <!-- Admin footer -->
        <?php include "admin-footer.php" ?>
        <!-- Admin footer -->

        <!--Add stock Modal -->
        <div class="modal fade" id="addStockModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Stock</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="product" class="form-label">Product</label>
                            <select id="product" class="form-select">
                                <option value="0">Select Product</option>
                                <?php
                                $rs = Database::search(" SELECT * FROM `product_details` WHERE `status` ='1' ");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $row = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($row['id']); ?>"><?php echo ($row['id'] . " - " . $row['name'] . " - " . $row['brand_name'] . " - " . $row['color_name'] . " - " . $row['size_name']); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Qty</label>
                            <input id="qty" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Unit Price</label>
                            <input id="unitPrice" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button onclick="addStock();" type="button" class="btn btn-primary">Add Stock</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:admin-signin.php");
}
?>