<?php require "connection.php"; ?>

<!-- filter form -->
<?php require "filter-form.php"; ?>
<!-- filter form -->


<div class="col-10 offset-0 col-md-8 offset-md-0 col-lg-9">
    <div class="row">
        <?php
        $search = $_GET['search'];

        $page = 1;
        if (isset($_GET['page']) && $_GET['page'] > 1) {
            $page = $_GET['page'];
        }
        $rs = Database::search(" SELECT * FROM `stock_view` WHERE `name` LIKE '%$search%' AND `status`='1' ");
        $num = $rs->num_rows;

        $resultPerPage = 1;
        $noOfPages = ceil($num / $resultPerPage);
        $pageResults = ($page - 1) * $resultPerPage;

        $rs2 = Database::search(" SELECT * FROM `stock_view` WHERE `name` LIKE '%$search%' AND `status`='1' LIMIT $resultPerPage OFFSET $pageResults ");
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
                        <li class="page-item active"><span class="page-link" onclick="search(<?php echo ($i); ?>);"><?php echo ($i); ?></span></li>

                    <?php
                    } else {
                    ?>
                        <li class="page-item"><span class="page-link" onclick="search(<?php echo ($i); ?>);"><?php echo ($i); ?></span></li>
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