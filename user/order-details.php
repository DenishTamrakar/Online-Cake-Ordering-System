<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>

    </style>
</head>

<body>
    <?php
    include '../includes/nav.php';
    if (!isset($_SESSION['user_id'])) {
        header('location:../login-page.php?value=5');
    }
    ?>
    <div class="d-flex m-100">
        <?php
        include '../includes/side-bar.php';
        ?>
        <div id="container"  class="container-fluid mx-3 mt-1 p-5">
            <?php
                if(isset($_GET['value'])){
                    if(isset($_GET['order'])){
                        $temp1 = $_GET['order'];
                    }
                    if($_GET['value'] == 1){
                        echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Order No: #".$temp1." has been cancelled!</strong></div>";
                    }elseif($_GET['value'] == 2){
                        echo "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Unable to cancel!</strong></div>";
                    }elseif($_GET['value'] == 3){
                        echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Order No: #".$temp1." has been paid for!!</strong></div>";
                    }
                }
            ?>
            <div class="d-flex align-item-center mb-2">
                <div class="bg-danger text-danger my-1" width="30px" height="10px">a</div>
                <div class="h1 ms-2">Order List</div>
            </div>
            <div class="row rounded-pill p-2" style="text-align:center;">
                <div class="col-sm-1">S.N</div>
                <div class="col-sm-4">Items</div>
                <div class="col-sm-2">Quantity</div>
                <div class="col-sm-2">Price</div>
                <div class="col-sm-3">Total</div>
            </div>
            <?php
            include '../includes/connection.php';
            $user_id = (int)$_SESSION['user_id'];
            $query = "SELECT DISTINCT item_id,item_status,item_placed,item_paid from items WHERE user_id = $user_id 
            ORDER BY
              CASE 
                WHEN item_status = 'pending' THEN 1
                ELSE 2
              END,
              item_placed DESC;";
            $result = $con->query($query);
            if ($result->num_rows > 0) {
                $i = 1;
                $all_total = 0;
                while ($row = $result->fetch_assoc()) {
                    $i = 1;
                    $timestamp1 = $row['item_placed'];
                    $timestamp2 = $row['item_paid'];
            ?>
                    <div class="rounded p-3 m-2" style="background-color:#D9D9D9">
                        <div class="d-flex justify-content-between m-3">
                            <div class="h7 ms-5">Order No: <span class="text-primary"><?php echo '#'.$row['item_id']; ?></span></div>
                            <div class="h7 me-5">Status: <?php $temp = $row['item_status'];
                                                            if ($temp == 'Pending') {
                                                                echo "<span class='text-warning'>" . $temp . "</span>";
                                                            } elseif ($temp == 'Paid') {
                                                                echo "<span class='text-success'>" . $temp . "</span>";
                                                            } ?> </div>
                        </div>
                        <div id="<?php echo $row['item_id']; ?>" class="collapse">
                            <div class="row rounded-pill p-2" style="text-align:center;">
                                <div class="col-sm-1">S.N</div>
                                <div class="col-sm-4">Items</div>
                                <div class="col-sm-2">Quantity</div>
                                <div class="col-sm-2">Price</div>
                                <div class="col-sm-3">Total</div>
                            </div>
                            <?php
                            $order_id = $row['item_id'];
                            $query1 = "SELECT * from items WHERE item_id = $order_id";
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
                            <div class="row p-2" style="text-align:center;">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">Total Amount</div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3"><?php echo $all_total;
                                                        $all_total = 0; ?></div>
                            </div>
                            <div class="h7 ps-5">
                                <?php
                                    if($temp == 'Paid'){
                                        ?>
                                        <div class="text-success"><?php echo '- Bill Paid: '.$timestamp2; ?></div>
                                        <?php
                                    }elseif($temp == 'Pending'){
                                        ?>
                                        <div class="text-warning"><?php echo '- Order Placed: '.$timestamp1; ?></div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                            <div class="d-flex justify-content-end m-3">
                                <a href="#<?php echo $order_id; ?>" data-bs-toggle="collapse" class="btn btn-info p-2">Details</a>
                                <?php
                                    if($temp == 'Pending'){
                                        ?>
                                        <a href="home1.php?value=<?php echo $order_id; ?>&value1=1" class="btn btn-success py-2 px-3 ms-2">Pay</a>
                                        <a href="delete-order.php?order_id=<?php echo $order_id ?>" class="btn btn-danger p-2 ms-2">Cancel</a>
                                        <?php
                                    }elseif($temp == 'Paid'){
                                        ?>
                                        <a href="receipt.php?order=<?php echo $order_id; ?>" class="btn btn-success p-2 ms-2">Receipt</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    <hr class="hr">
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>
 
</html>