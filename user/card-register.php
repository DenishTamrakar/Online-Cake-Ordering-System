<?php
    session_start();
    $pin = $_POST['pin_no'];
    $card = $_POST['card_no'];
    $user_id = (int)$_SESSION['user_id'];
    var_dump($user_id);
    var_dump($_POST['pin_no']);
    var_dump($_POST['card_no']);
    include '../includes/connection.php';
    $query = "UPDATE users SET user_card_no = ?, user_pin_no = ? WHERE user_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('ssi',$card, $pin, $user_id);
    if ($stmt->execute()) {
        $_SESSION['card'] = $card;
        $_SESSION['pin'] = $pin;
        header('location:balance-details.php?value=1');
    } else {
        header('location:card-details.php?value=1');
    }
?>