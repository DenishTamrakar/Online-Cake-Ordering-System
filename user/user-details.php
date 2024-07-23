<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <?php
    include '../includes/bootstrap.php';
    ?>
</head>

<body class="bg-dark">
    <?php
    include '../includes/nav.php';
    if (!isset($_SESSION['user_id'])) {
        header('location:../login-page.php?value=5');
    }
    ?>
    <div class="d-flex">
        <?php
            $a = $_SESSION['firstname'];
            $b = $_SESSION['lastname'];
            $c = $_SESSION['address'];
            $d = $_SESSION['city'];
            $e = $_SESSION['contact'];
            if($a == "" AND $b == "" AND $c == "" AND $d == "" AND $e == ""){
                echo "";
            }else{
                include '../includes/side-bar.php';
            }
        ?>
        <div id="container" class="container">
            <?php
            if (isset($_GET['value'])) {
                if ($_GET['value'] == 1) {
                    echo "<div class='alert alert-danger alert-dismissible mt-2'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <strong>Unable to save information!</strong></div>";
                }
            }
            ?>
            <div class="container d-flex justify-content-center">
                <form id="userValidate" onsubmit="return userValidate()" action="user-update.php" method="POST" class="m-5 p-5 border rounded w-50">
                    <div class="h3 text-white mb-4">User Details</div>
                    <div class="m-2">
                        <label class="form-label text-white" for="username">Username:</label>
                        <input class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>" type="text" disabled>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="m-2">
                                <label class="form-label text-white" for="firstName">First Name:</label>
                                <input class="form-control" value="<?php echo $_SESSION['firstname']; ?>" name="firstName" maxlength="20" type="text" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="m-2">
                                <label class="form-label text-white" for="lastName">Last Name:</label>
                                <input class="form-control" value="<?php echo $_SESSION['lastname']; ?>" name="lastName" maxlength="20" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="m-2">
                        <label class="form-label text-white" for="address">Address:</label>
                        <input class="form-control" name="address" value="<?php echo $_SESSION['address']; ?>" minlength="8" maxlength="30" type="text" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="m-2">
                                <label class="form-label text-white" for="city">City:</label>
                                <select id="" class="form-select" name="city" value="<?php echo $_SESSION['city']; ?>" selected>
                                    <option value="Kathmandu">Kathmandu</option>
                                    <option value="Lalitpur">Lalitpur</option>
                                    <option value="Bhaktapur">Bhaktapur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="m-2">
                                <label class="form-label text-white" for="contact">Contact No:</label>
                                <input class="form-control" name="contact" value="<?php echo $_SESSION['contact']; ?>" minlength="9" maxlength="10" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="m-2">
                        <label class="form-label text-white" for="e-mail">E-mail:</label>
                        <input class="form-control" id="email" value="<?php echo $_SESSION['email']; ?>" name="e-mail" maxlength="30" type="text" required>
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>
<script src="../js/user.js"></script>
 
</html>