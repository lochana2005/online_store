<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">

        <div class="">
            <img src="asset/img/logo.png" height="60" />
            <a class="navbar-brand ms-2 fw-bold" href="index.php">Online Store</a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-profile.php">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Order History</a>
                    </li>

                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger" href="signout.php">Sign Out</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-warning" href="signin.php">Sign In / Sign Up</a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</nav>