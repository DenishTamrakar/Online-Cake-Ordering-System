<?php
session_start();
$temp_order_id = "";
$temp_total = 0;
include '../includes/connection.php';
if (isset($_GET['value'])) {
    $temp_order_id = $_GET['value'];
    $temp_user_id = $_SESSION['user_id'];
    if(isset($_GET['order'])) {
        $temp_total = (int)$_GET['order'];
    }
}
$query = "UPDATE items SET item_status = 'Paid', item_paid = NOW() WHERE item_id = $temp_order_id";
if($con->query($query)){
    $original_balance = (int)$_SESSION['balance'];
    $balance = $original_balance - $temp_total;
    $query1 = "UPDATE users SET user_balance = $balance WHERE user_id = $temp_user_id";
    echo "\n".$query1;
    echo "\n".$balance;
    echo "\n".$original_balance;
    echo "\n".$temp_total;
    if($con->query($query1)){
        $_SESSION['balance'] = $balance;
        header("location:receipt.php?order=$temp_order_id");
    }
}
?>
