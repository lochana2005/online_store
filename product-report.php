<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Report -Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container">
        <div class="row mb-5">
            <div class="col-12 mt-5 d-flex justify-content-center gap-3">
                <button class="btn btn-dark" onclick="history.back();"><i class="bi bi-arrow-left"></i>BACK</button>
                <button class="btn btn-danger" onclick="printReport();"><i class="bi bi-printer-fill"></i>PRINT</button>
            </div>
        </div>
    </div>

    <div class="container" id="printArea">
        <div class="row">

            <div class="col-12 text-center">
                <h1>Product Report</h1>
            </div>

            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rs = Database::search(" SELECT * FROM `product_details` ");
                        $num = $rs->num_rows;

                        for ($x = 0; $x < $num; $x++) {
                            $row = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo ($row['id']); ?></td>
                                <td><?php echo ($row['name']); ?></td>
                                <td><?php echo ($row['description']); ?></td>
                                <td><?php echo ($row['cat_name']); ?></td>
                                <td><?php echo ($row['brand_name']); ?></td>
                                <td><?php echo ($row['color_name']); ?></td>
                                <td><?php echo ($row['size_name']); ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == "1") {
                                        echo ("Active");
                                    } else {
                                        echo ("Inactive");
                                    }
                                    ?>
                                </td>
                                <td>
                                    <img src="<?php echo ($row['img']); ?>" height="100" />
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>