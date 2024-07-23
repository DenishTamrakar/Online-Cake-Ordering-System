<?php
// Start session to manage user login status
session_start();

// Destroy session data to log out the user
session_destroy();
echo 'logout sucessful.';

// Redirect to login page after logout
header('location:login-page.php?value=4');
// exit;
?>
