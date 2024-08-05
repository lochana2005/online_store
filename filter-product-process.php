<?php include "connection.php"; ?>
<?php
$category = $_POST['category'];
$brand = $_POST['brand'];
$size = $_POST['size'];
$color = $_POST['color'];
$pf = $_POST['priceFrom'];
$pt = $_POST['priceTo'];
$search = $_POST['search'];
?>
<div class="col-10 offset-1 col-md-4 offset-md-0 col-lg-2 bg-dark-subtle py-4 rounded mt-2 ">

    <h2>Filters</h2>
    <hr />
    <div class="mb-2">
        <label class="form-label" for="">Category</label>
        <select class="form-select" name="" id="cat">
            <option value="0">Select Category</option>
            <?php
            $rs = Database::search(" SELECT * FROM `category` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['cat_id']); ?>" <?php if ($category == $d['cat_id']) {
                                                                    echo ("selected");
                                                                } ?>><?php echo ($d['cat_name']); ?></option>
            <?php
            }

            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Brand</label>
        <select class="form-select" name="" id="brand">
            <option value="0">Select Brand</option>
            <?php
            $rs = Database::search(" SELECT * FROM `brand` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['brand_id']); ?>" <?php if ($brand == $d['brand_id']) {
                                                                    echo ("selected");
                                                                } ?>><?php echo ($d['brand_name']); ?></option>
            <?php
            }

            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Color</label>
        <select class="form-select" name="" id="color">
            <option value="0">Select Color</option>
            <?php
            $rs = Database::search(" SELECT * FROM `color` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['color_id']); ?>" <?php if ($color == $d['color_id']) {
                                                                    echo ("selected");
                                                                } ?>><?php echo ($d['color_name']); ?></option>
            <?php
            }

            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Size</label>
        <select class="form-select" name="" id="size">
            <option value="0">Select Size</option>
            <?php
            $rs = Database::search(" SELECT * FROM `size` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['size_id']); ?>" <?php if ($size == $d['size_id']) {
                                                                    echo ("selected");
                                                                } ?>><?php echo ($d['size_name']); ?></option>
            <?php
            }

            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Price From</label>
        <input id="priceFrom" value="<?php echo ($pf); ?>" class="form-control" type="text">
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Price To</label>
        <input id="priceTo" value="<?php echo ($pt); ?>" class="form-control" type="text">
    </div>
    <div class="d-grid mt-3">
        <button onclick="filter(1);" class="btn btn-secondary">FILTER</button>
    </div>
</div>
<div class="col-10 offset-0 col-md-8 offset-md-0 col-lg-9">
    <div class="row">
        <?php

        $page = 1;
        if (isset($_POST['page']) && 1 < $_POST['page']) {
            $page = $_POST['page'];
        }

        $query = "SELECT * FROM `stock_view` ";

        $conditions = [];

        // filter by text
        if (!empty($search)) {
            $conditions[] = "`name` LIKE '%$search%' ";
        }

        // filter by category
        if ($category != 0) {
            $conditions[] = "`cat_id` = '$category'";
        }

        // filter by brand
        if ($brand != 0) {
            $conditions[] = "`brand_id` = '$brand'";
        }

        // filter by size
        if ($size != 0) {
            $conditions[] = "`size_id` = '$size'";
        }

        // filter by color
        if ($color != 0) {
            $conditions[] = "`color_id` = '$color'";
        }

        // filter by price from
        if (!empty($pf) && empty($pt)) {
            $conditions[] = "`price` >= '$pf'";
        }

        // filter by price from
        if (!empty($pt) && empty($pf)) {
            $conditions[] = "`price` <= '$pt'";
        }

        // filter by price range
        if (!empty($pf) && !empty($pt)) {
            $conditions[] = " `price` BETWEEN '$pf' AND '$pt' ";
        }

        // filter by price from
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $rs = Database::search(($query));
        $num = $rs->num_rows;

        $resultsPerPage = 4;
        $noOfPages = ceil($num / $resultsPerPage);
        $pageResults = ($page - 1) * $resultsPerPage;

        $query .= " LIMIT $resultsPerPage OFFSET $pageResults";
        $rs2 = Database::search($query);
        $num2 = $rs2->num_rows;

        if ($num2 > 0) {
            for ($x = 0; $x < $num2; $x++) {
                $row = $rs2->fetch_assoc();
        ?>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <div class="card">
                        <a href="single-product-view.php?product=<?php echo ($row['stock_id']); ?>" class="text-light text-decoration-none">
                            <img src="<?php echo ($row['img']); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo ($row['name']); ?></h5>
                                <p class="card-text"><?php echo ($row['description']); ?></p>
                                <p class="card-text fs-3 fw-bold text-warning-emphasis">Rs.<?php echo ($row['price']); ?>.00</p>
                            </div>
                        </a>
                    </div>
                </div>

            <?php
            }
        } else {
            ?>
            <div class="col-12 text-center mt-5">
                <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 150px;"></i>
                <h2>No Products Found!</h2>
                <span>No matching products are found for the search text you have entered.</span>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
if ($num2 > 0) {
?>
    <div class=" offset-2 col-10 d-flex justify-content-center mb3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($i = 1; $i <= $noOfPages; $i++) {
                    if ($i == $page) {
                ?>
                        <li class="page-item active"><span class="page-link" onclick="filter(<?php echo ($i); ?>);"><?php echo ($i); ?></span></li>

                    <?php
                    } else {
                    ?>
                        <li class="page-item"><span class="page-link" onclick="filter(<?php echo ($i); ?>);"><?php echo ($i); ?></span></li>
                <?php
                    }
                }
                ?>

                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php
}
?>