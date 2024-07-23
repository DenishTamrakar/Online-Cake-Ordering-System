<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance</title>
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
<?php
    include '../includes/nav.php';
    if(!isset($_SESSION['user_id'])){
        header('location:../login-page.php?value=5');
    }
    ?>
    <div id="container" class="d-flex mh-100">
        <?php
            include '../includes/side-bar.php';
        ?>
        <div class="container-fluid mx-3 mt-1 p-5">
            <?php
                if(isset($_GET['value'])){
                    if($_GET['value'] == 1){
                        echo "<div class='alert alert-success alert-dismissible'  >
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Card Sucessfully Registered!</strong></div>";
                    }elseif($_GET['value'] == 2){
                        echo "<div class='alert alert-success alert-dismissible'  >
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Balance Successfully Updated!</strong></div>";
                    }
                    elseif($_GET['value'] == 3){
                        echo "<div class='alert alert-danger alert-dismissible'  >
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Unable to update the balace!</strong></div>";
                    }
                }
            ?>
            <div class="d-flex align-item-center mb-2">
                <div class="bg-success text-success my-1" width="30px" height="10px">a</div>
                <div class="h1 ms-2">Balance</div>
            </div>
            <div class="d-flex justify-content-center align-content-center w-100 h-60 mt-3 rounded">
            <form id="validateBalance" onsubmit="return validateBalance()" action="balance.php" method="POST" class="border border-info rounded p-5 shadow-lg w-50 bg-secondary">
                <div class="h3 text-white">Add balance:</div>
                <div class="m-2">
                    <label class="form-label text-white">Card No:</label>
                    <input type="number" value="<?php echo $_SESSION['card']; ?>" class="form-control" id="card_no_1" name="card_no" placeholder="Enter your card number" required>
                </div>
                <div class="m-2">
                    <label class="form-label text-white">PIN No:</label>
                    <input type="number" class="form-control" id="pin_no_1" name="pin_no" placeholder="Enter your PIN number" required>
                </div>
                <div class="m-2">
                    <label class="form-label text-white">Amount:</label>
                    <input type="number" class="form-control" id="amt_1" name="amt" min="1" max="10000" placeholder="Enter the amount" required>
                </div>
                <div class="button d-flex justify-content-center mt-4 mb-2">
                    <button type="submit" class="btn btn-outline-light">Add</button>
                </div>
            </form>
            <!-- <div class="h1 ps-3 pt-5">Balance Available: <?php //echo $_SESSION['balance']; ?></div>   -->
        </div>
    </div>
    </div>
    <?php
        include '../includes/footer.php';
    ?>
</body>
<script src="../js/balance.js"></script>
 
</html>