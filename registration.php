<?php
    $err = [];
    include 'includes/connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['e_mail'];
    function validatePassword($password) {
        // Check if password length is at least 8 characters
        if (strlen($password) < 8) {
            return false;
        }
    
        // Check if password contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
    
        // Check if password contains at least one symbol (non-alphanumeric character)
        if (!preg_match('/\W/', $password)) {
            return false;
        }
    
        // Check if password contains at least one digit
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }
    
        // If all conditions pass, the password is valid
        return true;
    }
    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        // echo "<div class='alert alert-success alert-dismissible'>
        // <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        // <strong>Username already exists!</strong>
        // </div>";
        // include 'registration-page.php';
        header('location:registration-page.php?value=1');
    } else {
        if (validatePassword($password) == FALSE) {
            // echo "<script>alert('Invalid Password. The password should consist of atleast one capitalized letter, one symbol and one number.')</script>";
            // header('location:../registration-page.php');
            // echo "<div class='alert alert-success alert-dismissible'>
            // <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            // <strong>Password Invalid!</strong>
            // </div>";
            // include 'registration-page.php';
            header('location:registration-page.php?value=2');
        }else{

        // Insert new user into database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $temp = rand(100000,999999);
            function check($con,$i){
                // $i = rand(100000,999999);
                $query = "SELECT * FROM users WHERE user_id='$i'";
                $result = $con->query($query); 
                if ($result->num_rows > 0) {
                        $i = rand(100000,999999);
                        check($con,$i);
                }
                return $i;
            }
            $user_id = check($con,$temp);
            $insertQuery = "INSERT INTO users (user_id, user_name, user_email, user_password, user_role, user_creation) VALUES ($user_id, '$username', '$email', '$hashedPassword', 'User', NOW())";

            if ($con->query($insertQuery) === TRUE) {
                echo "<script>alert('Registration Successful.')</script>";
                header('location:login-page.php?value=3');
            } else {
                // echo "<div class='alert alert-success alert-dismissible'>
                // <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                // <strong>Unable to register.!</strong>
                // </div>";
                // include 'registration-page.php';
                header('location:registration-page.php?value=3');
            }
        }

    // Close database connection
    $con->close();
    }
?>