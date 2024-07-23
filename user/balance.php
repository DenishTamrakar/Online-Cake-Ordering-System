<?php
    session_start();
    $pin = $_POST['pin_no'];
    $card = $_POST['card_no'];
    $amount = (int)$_POST['amt'];
    $user_id = (int)$_SESSION['user_id'];
    $user_pin = $_SESSION['pin'];
    $user_card = $_SESSION['card'];
    $user_amount =  $amount + (int)$_SESSION['balance'];
    include '../includes/connection.php';
    if($pin == $user_pin AND $card == $user_card){
        $query = "UPDATE users SET user_balance = ? where user_id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ii', $user_amount, $user_id);
        if ($stmt->execute()) {
            $_SESSION['balance'] = $user_amount;
            header('location:balance-details.php?value=2');
        }
    }else{
        header('location:balance-details.php?value=3');
    }
?>