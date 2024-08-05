<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Color</th>
            <th>Size</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        include "connection.php";

        $page = 1;

        if (isset($_GET["page"]) && $_GET["page"] > 1) {
            $page = $_GET["page"];
        }

        $rs = Database::search(" SELECT * FROM `product_details` ");
        $num = $rs->num_rows;

        $resultsPerPage = 5;
        $noOfPages = ceil($num / $resultsPerPage);
        $pageResults = ($page - 1) * $resultsPerPage;

        $rs2 = Database::search("SELECT * FROM `product_details` LIMIT $resultsPerPage OFFSET $pageResults ");
        $num2 = $rs2->num_rows;

        for ($x = 0; $x < $num2; $x++) {
            $row = $rs2->fetch_assoc();
        ?>

            <tr>
                <td><?php echo ($row['id']); ?></td>
                <td><?php echo ($row['name']); ?></td>
                <td><?php echo ($row['cat_name']); ?></td>
                <td><?php echo ($row['brand_name']); ?></td>
                <td><?php echo ($row['color_name']); ?></td>
                <td><?php echo ($row['size_name']); ?></td>
                <td>
                    <?php
                    if ($row['status'] == 1) {
                    ?>
                        <button onclick="changeProductStatus(<?php echo($row['id']) ?>);" class="btn btn-sm btn-success fw-bold w-50">Active</button>
                    <?php
                    } else {
                    ?>
                        <button onclick="changeProductStatus(<?php echo($row['id']) ?>);" class="btn btn-sm btn-danger fw-bold w-50">Deactive</button>
                    <?php
                    }
                    ?>
                </td>
                <td><button class="btn btn-sm btn-light fw-bold w-50" onclick="loadProdUpdateData(<?php echo($row['id']) ?>);">EDIT</button></td>
            </tr>

        <?php
        }
        ?>