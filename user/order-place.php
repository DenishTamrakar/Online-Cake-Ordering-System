<?php
include '../includes/connection.php';
session_start();
$user_id = $_SESSION['user_id'];
$temp = rand(100000, 999999);
function check($con, $i)
{
    // $i = rand(100000,999999);
    $query = "SELECT * FROM users WHERE user_id='$i'";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $i = rand(100000, 999999);
        check($con, $i);
    }
    return $i;
}
$order_id = check($con, $temp);
$temp_total = 0;
$query = "SELECT * FROM cake where cake_status = 1";
$result = $con->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temp = "quantity" . $row['cake_id'];
        if (!$_POST["$temp"] == NULL || !$_POST["$temp"] == 0) {
            $quantity = $_POST["$temp"];
            $item = $row['cake_name'];
            $price = $row['cake_price'];
            $total = $quantity * $price;
            $insertQuery = "INSERT INTO items (item_id, user_id, item_name, item_quantity, item_price, item_total, item_status, item_placed) VALUES ('$order_id', '$user_id', '$item', '$quantity', '$price', '$total', 'Pending', NOW());";
            if ($con->query($insertQuery) === TRUE) {
                echo 'done';
            }
        }
    }
    header("location:home1.php?value=$order_id");
}
