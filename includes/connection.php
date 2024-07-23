<?php
    $servername = "localhost";
    $server_user = "root";
    $server_pass = "";
    $dbname = "online_system";
    $con = new mysqli($servername, $server_user, $server_pass, $dbname);
    if ($con->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
?>