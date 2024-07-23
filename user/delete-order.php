<?php
    include '../includes/connection.php';
    session_start();
    $temp_order_id = $_GET['order_id'];
    $query = "DELETE FROM items where item_id = $temp_order_id;";
    if($con->query($query) === TRUE){
        header("location:order-details.php?order=$temp_order_id&value=1");
    }else{
        header("location:order-details.php?order=$temp_order_id&value=2");
    }
?>