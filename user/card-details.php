<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Details</title>
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<?php
    include '../includes/nav.php';
    include '../includes/connection.php';
    if(!isset($_SESSION['user_id'])){
        header('location:../login-page.php?value=5');
    }
?>
<body height="100%">
<div class="d-flex">
    <?php
        include '../includes/side-bar.php';
    ?>
    <div id="container" class="container-fluid mx-3 mt-1 p-5">
        <?php
            if(isset($_GET['value'])){
                if($_GET['value'] == 1){
                    echo "<div class='alert alert-success alert-dismissible'  >
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <strong>Unable to register!</strong></div>";
                }
            }
        ?>
        <div class="d-flex align-item-center mb-2">
            <div class="bg-danger text-danger my-1" width="30px" height="10px">a</div>
            <div class="h1 ms-2">Credit Card Details</div>
        </div>
        <div class="d-flex justify-content-center align-content-center w-75 mt-3 rounded">
        <form id="validateCard" onsubmit="return validateCard()" action="card-register.php" method="POST" class="border border-info rounded p-5 shadow-lg bg-secondary">
            <div class="h3 text-white">Add credit card details.</div>
            <div class="m-2">
                <label class="form-label text-white">Card No:</label>
                <input type="number" class="form-control" id="card_no" maxlength="10" name="card_no" placeholder="Enter your card number" required>
            </div>
            <div class="m-2">
                <label class="form-label text-white">Card No:</label>
                <input type="number" class="form-control" id="pin_no" maxlength="4" name="pin_no" placeholder="Enter your PIN number" required>
            </div>
            <div class="button d-flex justify-content-center my-4">
                <button type="submit" class="btn btn-outline-light">Add</button>
            </div>
        </form>
        <div class="h7 p-2 text-danger">
            *Note: Please insert valid card number. <br>Your credit card number cannot be changed.<br>**Note: Please contact customer service <br>for credit card change.
        </div>
    </div>
</div>
</div>
<?php
    include '../includes/footer.php';
?>
<script src="../js/card.js"></script>
</body>
 
</html>