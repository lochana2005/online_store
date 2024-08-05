<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        require "connection.php";

        $page = 1;

        if (isset($_GET["page"]) && $_GET["page"] > 1) {
            $page = $_GET["page"];
        }


        $rs = Database::search(" SELECT * FROM `users` WHERE `user_type_id` = '2' ");
        $num = $rs->num_rows;

        $resultsPerPage = 5;
        $noOfPages = ceil($num / $resultsPerPage);
        $pageResults = ($page - 1) * $resultsPerPage;

        $rs2 = Database::search(" SELECT * FROM `users` WHERE `user_type_id` = '2' LIMIT $resultsPerPage OFFSET $pageResults ");
        $num2 = $rs2->num_rows;


        for ($x = 0; $x < $num2; $x++) {
            $row = $rs2->fetch_assoc();
        ?>

            <tr>
                <td><?php echo ($row["id"]); ?></td>
                <td><?php echo ($row["fname"]); ?></td>
                <td><?php echo ($row["lname"]); ?></td>
                <td><?php echo ($row["email"]); ?></td>
                <td><?php echo ($row["mobile"]); ?></td>
                <?php if ($row["status"] == "1") {
                ?>
                    <td><button class="btn btn-sm btn-success w-100" onclick="changeUser(<?php echo ($row['id']) ?>  , 0,<?php echo ($page) ?>);">Active</button></td>
                <?php
                } else {
                ?>
                    <td><button class="btn btn-sm btn-danger w-100" onclick="changeUser(<?php echo ($row['id']) ?>, 1,<?php echo ($page) ?>);">Deactive</button></td>
                <?php
                }
                ?>
            </tr>

        <?php
        }

        ?>
    </tbody>
</table>

<nav class="mt-3">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous" <?php if ($page > 1) { ?> onclick="loadUsers(<?php echo ($page - 1); ?>);" <?php } ?>>
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <?php
        for ($i = 1; $i <= $noOfPages; $i++) {
            if ($i == $page) {
        ?>
                <li class="page-item active"><a class="page-link" onclick="loadUsers(<?php echo ($i); ?>);"><?php echo ($i); ?></a></li>

            <?php
            } else {
            ?>
                <li class="page-item"><a class="page-link" onclick="loadUsers(<?php echo ($i); ?>);"><?php echo ($i); ?></a></li>
        <?php
            }
        }
        ?>


        <li class="page-item">
            <a class="page-link" href="<?php if ($page < $noOfPages) { ?> onclick="loadUsers(<?php echo ($page + 1); ?>);" <?php } ?>" aria-label="Next" <?php if ($page < $noOfPages) { ?> onclick="loadUsers(<?php echo ($page + 1); ?>);" <?php } ?>>
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
