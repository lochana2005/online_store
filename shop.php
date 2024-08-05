<?php
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body onload="search(1);">

    <!-- Header -->
    <?php include "header.php"; ?>
    <!-- Header -->

    <div class="container-fluid">

        <!-- search -->
        <form action="shop.php" method="GET" class="row">
            <div class="col-4 offset-3 mt-4">
                <div class="form-floating">
                    <input type="text" class="form-control" name="search" id="search" value="<?php echo ($search); ?>" placeholder="Search..." />
                    <label for="search">Search</label>
                </div>
            </div>
            <div class="col-2 mt-4 d-grid">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </form>
        <!-- search -->

        <div class="row" id="content">
            <div class="col-2 bg-dark-subtle py-4 rounded mt-2 ms-3">

                <h2>Filters</h2>
                <hr />
                <div class="mb-2">
                    <label class="form-label" for="">Category</label>
                    <select class="form-select" name="" id="">
                        <option value="0">Select Category</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Brand</label>
                    <select class="form-select" name="" id="">
                        <option value="0">Select Brand</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Color</label>
                    <select class="form-select" name="" id="">
                        <option value="0">Select Color</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Size</label>
                    <select class="form-select" name="" id="">
                        <option value="0">Select Size</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Price From</label>
                    <input class="form-control" type="text">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="">Price To</label>
                    <input class="form-control" type="text">
                </div>

            </div>

            <div class="col-9">
                <div class="row">

                    <div class="col-12 col-md-4 col-lg-3 my-3">
                        <div class="card">
                            <a href="#" class="text-light text-decoration-none">
                                <img src="asset\products\667e58c28075adepositphotos_48410095-stock-photo-sample-blue-square-grungy-stamp.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">T shirt</h5>
                                    <p class="card-text">This is a shirt bro</p>
                                    <p class="card-text fs-3 fw-bold text-warning-emphasis">Rs.1600.00</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class=" offset-2 col-10 d-flex justify-content-center mb3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>