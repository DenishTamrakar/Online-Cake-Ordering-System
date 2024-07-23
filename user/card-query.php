<?php
    session_start();
    include '../includes/connection.php';
    if(!isset($_SESSION['user_id'])){
        header('location:../login-page.php?value=5');
    }
    $a = $_SESSION['card'];
    var_dump($a);
    if($a == ""){
        header('location:card-details.php');
    }else{
        header('location:balance-details.php');
    }
?>