<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Records</title>
</head>

<body>
    <?php
    session_start();
    include 'admin-nav.php';
    if (!isset($_SESSION['user_id'])) {
        header('location:../login-page.php?value=5');
    }
    ?>
    <div id="container" class="d-flex m-100">
        <?php
        include 'admin-sidebar.php';
        ?>
        <div id="container" class="container-fluid mx-3 mt-1 p-5">
            <div class="d-flex align-item-center mb-2">
                <div class="bg-danger text-danger my-1" width="30px" height="10px">a</div>
                <div class="h1 ms-2">Users List</div>
            </div>
            <hr>
            <div class="table">
                <div class="row rounded-pill p-2" style="text-align:center;">
                    <div class="col-sm-2"><strong>S.N</strong></div>
                    <div class="col-sm-2"><strong>Username</strong></div>
                    <div class="col-sm-2"><strong>Name</strong></div>
                    <div class="col-sm-2"><strong>Email</strong></div>
                    <div class="col-sm-2"><strong>Created Date</strong></div>
                    <div class="col-sm-2"><strong>No. of Orders</strong></div>
                </div>
                <hr>
                <?php
                include '../includes/connection.php';
                $query = "SELECT * FROM users WHERE user_role = 'User' ORDER BY user_creation";
                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="row rounded-pill p-2" style="text-align:center;">
                            <div class="col-sm-2"><?php echo $i; ?></div>
                            <div class="col-sm-2"><?php echo $row['user_name']; ?></div>
                            <div class="col-sm-2"><?php echo $row['user_first_name']." ".$row['user_last_name'] ?></div>
                            <div class="col-sm-2"><?php echo $row['user_email']; ?></div>
                            <div class="col-sm-2"><?php echo $row['user_creation']; ?></div>
                            <div class="col-sm-2">
                                <?php
                                $a = $row['user_id'];
                                    $q = "SELECT COUNT(DISTINCT item_id) AS item_count FROM items WHERE user_id = $a;";
                                    $r = $con->query($q);
                                    if ($r->num_rows > 0) {
                                        while ($row1 = $r->fetch_assoc()) {
                                            echo "<strong>".$row1['item_count']."</strong>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                <?php
                        $i++;
                    }
                }
                ?>
                <hr>
            </div>
        </div>
    </div>
    <?php
            include 'admin-footer.php';
        ?>
</body>

</html>