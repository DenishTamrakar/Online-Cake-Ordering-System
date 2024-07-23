<?php
    include '../includes/connection.php';
    $query = "SELECT * FROM cake";
    $result = $con->query($query);
    $temp1 = 1+$result->num_rows;
    $temp2 = 1;
    while($temp1 != $temp2){
        if($_POST['quantity'.$temp2] == "Available"){
            $q = "UPDATE cake SET cake_status = 1 WHERE cake_id = $temp2";
            $con->query($q);
        }else{
            $q = "UPDATE cake SET cake_status = 0 WHERE cake_id = $temp2";
            $con->query($q);
        }    
        $temp2++;
    }
    header('location:home.php?value=1');
?>