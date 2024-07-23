<?php
    include '../includes/connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $email = $_POST['e-mail'];
    $query = "UPDATE users SET user_first_name = '$firstName', user_last_name = '$lastName', user_address = '$address', user_city = '$city', user_contact = '$contact', user_email = '$email' WHERE user_id = $user_id";
    if($con->query($query)){
        $_SESSION['firstname'] = $firstName;
        $_SESSION['lastname'] = $lastName;
        $_SESSION['address'] = $address;
        $_SESSION['city'] = $city;
        $_SESSION['contact'] = $contact;
        $_SESSION['email'] = $email;
        header('location:home.php?value=1');
    }else{
        header('location:user-details.php?value=1');
    }
?>