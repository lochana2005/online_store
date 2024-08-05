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
        <link rel="stylesheet" href="bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <title>User Management - Online Store</title>
    </head>

    <body onload="loadProducts(1);">
        <!-- Admin header -->
        <?php include "admin-header.php" ?>
        <!-- Admin header -->

        <div class="container admin-body">
            <div class="row d-flex justify-content-center">

                <div class="col-10 mt-5">
                    <h2 class="text-center">Product Management</h2>

                    <div class="row">
                        <div class="col-4 offset-4 d-flex justify-content-center mb-3">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#registerProductModal">Register product</button>
                        </div>
                        <div class="col-6 offset-3 d-flex justify-content-around">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerBrandModal">Add Brand</button>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerCatModal">Add category</button>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerColorModal">Add color</button>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerSizeModal">Add size</button>
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

        <!--Brand Modal -->
        <div class="modal fade" id="registerBrandModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Register Brand</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Brand Name</label>
                            <input id="brandName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="button" onclick="registerBrand();" class="btn btn-primary">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Category Modal -->
        <div class="modal fade" id="registerCatModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Register Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Category Name</label>
                            <input id="catName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="button" onclick="registerCat();" class="btn btn-primary">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Color Modal -->
        <div class="modal fade" id="registerColorModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Register Color</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Color Name</label>
                            <input id="colorName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="button" onclick="registerColor();" class="btn btn-primary">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Size Modal -->
        <div class="modal fade" id="registerSizeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Register Size</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Size</label>
                            <input id="size" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="button" onclick="registerSize();" class="btn btn-primary">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Register Product -->
        <div class="modal fade" id="registerProductModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Register Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="prodName" class="form-label">Product Name</label>
                            <input id="prodName" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="prodDesc" class="form-label">Product Description</label>
                            <textarea id="prodDesc" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="mb-2">
                            <label for="prodCat" class="form-label">Category</label>
                            <select name="" id="prodCategory" class="form-select">
                                <option value="0">Select Category</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `category` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['cat_id']); ?>"><?php echo ($d['cat_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        
                        <div class="mb-2">
                            <label for="prodBrand" class="form-label">Brand</label>
                            <select name="" id="prodBrand" class="form-select">
                                <option value="0">Select Brand</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `brand` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['brand_id']); ?>"><?php echo ($d['brand_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="prodColor" class="form-label">Color</label>
                            <select name="" id="prodColor" class="form-select">
                                <option value="0">Select color</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `color` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['color_id']); ?>"><?php echo ($d['color_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="prodSize" class="form-label">Size</label>
                            <select name="" id="prodSize" class="form-select">
                                <option value="0">Select size</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `size` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['size_id']); ?>"><?php echo ($d['size_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="prodImage" class="form-label">Product Image</label>
                            <input id="prodImage" class="form-control" type="file"></input>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="button" onclick="registerProduct();" class="btn btn-primary">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>


        <!--Update Product -->
        <div class="modal fade" id="updateProductModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Update Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-2">
                            <label for="uProdId" class="form-label">Product Id</label>
                            <input id="uProdId" type="text" disabled class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="uProdName" class="form-label">Product Name</label>
                            <input id="uProdName" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="prodDesc" class="form-label">Product Description</label>
                            <textarea id="uProdDesc" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="mb-2">
                            <label for="uProdCategory" class="form-label">Category</label>
                            <select id="uProdCategory" class="form-select">
                                <option value="0">Select Category</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `category` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['cat_id']); ?>"><?php echo ($d['cat_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        
                        <div class="mb-2">
                            <label for="uProdBrand" class="form-label">Brand</label>
                            <select id="uProdBrand" class="form-select">
                                <option value="0">Select Brand</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `brand` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['brand_id']); ?>"><?php echo ($d['brand_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="uProdColor" class="form-label">Color</label>
                            <select name="" id="uProdColor" class="form-select">
                                <option value="0">Select color</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `color` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['color_id']); ?>"><?php echo ($d['color_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="uProdSize" class="form-label">Size</label>
                            <select name="" id="uProdSize" class="form-select">
                                <option value="0">Select size</option>

                                <?php
                                $rs = Database::search(" SELECT * FROM `size` ");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo($d['size_id']); ?>"><?php echo ($d['size_name']); ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="uProdImage" class="form-label">Product Image Preview</label>
                            <img id="uProdImageTag" class="form-control"></img>
                        </div>
                        
                        <div class="mb-2">
                            <label for="uProdImage" class="form-label">Product Image</label>
                            <input id="uProdImage" class="form-control" onchange="updateProdImage();" type="file"></input>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        <button type="button" onclick="updateProduct();" class="btn btn-primary">UPDATE</button>
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