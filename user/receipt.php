<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body>
    <?php
    include '../includes/nav.php';
    include '../includes/connection.php';
    if (!isset($_SESSION['user_id'])) {
        header('location:../login-page.php?value=5');
    }
    $user_id = "";
    if (isset($_GET['order'])) {
        $temp = $_GET['order'];
        $query = "SELECT DISTINCT user_id FROM ITEMS WHERE item_id = $temp;";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
            }
        }
    }
    ?>
    <div class="d-flex">
        <?php
        include '../includes/side-bar.php';
        ?>
        <div id="container"  class="container">
        <?php
            if (isset($_GET['value'])) {
                if ($_GET['value'] == 1) {
                    echo "<div class='alert alert-success alert-dismissible m-1'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Receipt Downloaded!</strong></div>";
                }
            }
            ?>
            <div class="container d-flex justify-content-center mw-100">
                <!-- Your HTML content -->
                <div id="receipt" class="w-50 m-1 shadow-lg" style="height:120vh">
                    <div class="mt-2">
                        <div class="d-flex justify-content-end me-3">
                            <div class="d-flex flex-column justify-content-end p-3">
                                <div class="d-flex justify-content-end flex-column align-items-end">
                                    <img src="../img/Gaming.png" alt="" class="rounded-circle me-3" height="60px" width="60px">
                                    <div class="h4">Dragon Bakery</div>
                                    <div class="h7">Lagankhel, Lalitpur, Nepal</div>
                                    <div class="h7">Tel: +977 9841808815</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mx-2 h-100">
                            <div class="container m-2">
                                <div class="h2"><strong>INVOICE</strong></div>
                                <hr>
                                <div class="h7 d-flex justify-content-between mx-2">
                                    <div class="h7">Order No:</div>
                                    <div class="h7">#<?php echo $temp; ?></div>
                                </div>
                                <hr>
                                <?php
                                $query = "SELECT user_first_name, user_last_name, user_address, user_city, user_contact FROM users WHERE user_id = $user_id";
                                $result = $con->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <div class="h7 d-flex justify-content-between mx-2">
                                            <div class="h7">Bill to:</div>
                                            <div class="h7"><?php echo $row['user_first_name'] . " " . $row['user_last_name']; ?></div>
                                        </div>
                                        <div class="h7 d-flex flex-column align-items-end mx-2">
                                            <div class="h7"><?php echo $row['user_address'] . ", " . $row['user_city']; ?></div>
                                            <div class="h7"><?php echo $row['user_contact']; ?></div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="container m-2 mh-100" style="height:49vh;">
                                <hr>
                                <div class="row rounded-pill p-2" style="text-align:center;">
                                    <div class="col-sm-1">S.N</div>
                                    <div class="col-sm-4">Description</div>
                                    <div class="col-sm-2">Quantity</div>
                                    <div class="col-sm-2">Price</div>
                                    <div class="col-sm-3">Total</div>
                                </div>
                                <hr>
                                <?php
                                $i = 1;
                                $all_total = 0;
                                $query1 = "SELECT * from items WHERE item_id = $temp";
                                $result1 = $con->query($query1);
                                if ($result1->num_rows > 0) {
                                    while ($row = $result1->fetch_assoc()) {
                                ?>
                                        <div class="row p-2" style="text-align:center;">
                                            <div class="col-sm-1"><?php echo $i; ?></div>
                                            <div class="col-sm-4"><?php echo $row['item_name']; ?></div>
                                            <div class="col-sm-2"><?php echo $row['item_quantity']; ?></div>
                                            <div class="col-sm-2"><?php echo $row['item_price']; ?></div>
                                            <div class="col-sm-3"><?php echo $row['item_total'];
                                                                    $all_total += $row['item_total'];
                                                                    $i++; ?></div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <hr>
                                <div class="row rounded-pill p-2" style="text-align:center;">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">Total</div>
                                    <div class="col-sm-3"><?php echo $all_total; ?></div>
                                </div>
                            </div>
                            <div class="">
                                <hr>
                                <div class="d-flex justify-content-center">
                                    If you have any questions, please contact : query@dragonbakery.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center m-1">
                <a href="receipt-download.php?order=<?php echo $temp; ?>" class="btn btn-outline-success">Download</a>
            </div>
        </div>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>
 
</html>