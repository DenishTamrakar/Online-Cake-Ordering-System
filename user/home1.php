<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Info</title>
</head>
<?php
    include '../includes/nav.php';
    include '../includes/connection.php';
    if(!isset($_SESSION['user_id'])){
        header('location:../login-page.php?value=5');
    }
?>
<body height="100%">
<div class="d-flex mh-100"> 
    <?php
        include '../includes/side-bar.php';
        $order_id = $_GET['value'];
        if(isset($_GET['value1'])){$temp1 = $_GET['value1'];}
    ?>
    <div id="container"  class="container mh-100 mb-5">
        <div class="bg-success d-flex justify-content-center items-align-center p-3 my-3 text-white">Your order has been <?php if(isset($temp1)){echo "already ";} ?>placed successfully.</div>
        <div class="shadow p-3 mt-3">
        <div class="h7 m-2">Your order details are shown below your reference:</div>
        <div class="h3 m-3">Order no: <strong class="text-info"><?php echo "#".$order_id; ?></strong></div>
        <table class="table table-striped">
            <tr>
                <th>S.n</th>
                <th>Order Items</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        <?php
            
            $query = "SELECT * FROM items where item_id = $order_id";
            $result = $con->query($query);
            if ($result->num_rows > 0)
            {
                $i = 1;
                $all_total = 0;
                while($row = $result->fetch_assoc()) 
                {    
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['item_quantity']; ?></td>
                        <td><?php echo $row['item_price']; ?></td>
                        <td><?php echo $row['item_total']; $all_total += $row['item_total'];$i++;?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td></td>
                    <td>Total Amount</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $all_total; ?></td>
                </tr>
                <?php
            }
        ?>
        </table>
        </div>
        <div class="d-flex justify-content-between">
            <?php
                $balance = $_SESSION['balance'];
                if($all_total <= $balance){
                    ?>
                        <a href="pay.php?value=<?php echo $order_id; ?>&order=<?php echo $all_total; ?>" class="btn btn-success ms-5 mt-5">Confirm</a>  
                    <?php
                }else{
                    ?>
                        <a href="card-query.php" class="btn btn-info ms-5 mt-5">Load Balance</a>
                    <?php
                }
            ?>
            <a href="delete-order.php?order_id=<?php echo $order_id; ?>" class="btn btn-danger me-5 mt-5">Cancel</a>
        </div>
    </div>
</div>
<?php
    include '../includes/footer.php'
?>
</body>
 
</html>