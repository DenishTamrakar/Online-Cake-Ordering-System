<?php
    include 'includes/connection.php';
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['user_password'])) {
            // Password is correct, log the user in
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['email'] = $user['user_email'];
            $_SESSION['balance'] = (int)$user['user_balance'];
            $_SESSION['card'] = $user['user_card_no'];
            $_SESSION['pin'] = $user['user_pin_no'];
            $_SESSION['role']=$user_role = $user['user_role'];
            $a = $_SESSION['firstname'] = $user['user_first_name'];
            $b = $_SESSION['lastname'] = $user['user_last_name'];
            $c = $_SESSION['address'] = $user['user_address'];
            $d = $_SESSION['city'] = $user['user_city'];
            $e = $_SESSION['contact'] = $user['user_contact'];
            // Redirect to a protected page
            if($user_role == 'User'){
                if($a == "" AND $b == "" AND $c == "" AND $d == "" AND $e == ""){
                    header('location: user/user-details.php');
                }else{
                    header('location: user/home.php');
                }
            }else{
                header('location: admin/home.php');
            }

            exit;
        } else {
            // Incorrect password
            header('location:login-page.php?value=2');
        }
    } else {
        // User not found
        header('location:login-page.php?value=1');
    }
    $con->close();
?>