<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Login Page</title>
</head>

<body class="bg-dark">
    <?php
    include 'includes/nav.php';
    if (isset($_GET['value'])) {
        if ($_GET['value'] == 1) {
            echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>User not found!</strong></div>";
        } elseif ($_GET['value'] == 2) {
            echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Password Incorrect!</strong></div>";
        } elseif ($_GET['value'] == 3) {
            echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>User Registered!</strong></div>";
        } elseif ($_GET['value'] == 4) {
            echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Logout Sucessfully!</strong></div>";
        } elseif ($_GET['value'] == 5) {
            echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Please register or login first!</strong></div>";
        }
    }
    ?>
    <div class="container d-flex justify-content-center align-items-center bg-dark" style="height:86vh;">
        <form class="border border-light p-5 rounded" method="POST" action="login.php">
            <div class="h2 mb-4 text-white ps-5">Login</div>
            <div class="my-3">
                <label for="" class="h7 form-label text-light">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" required>
                <span id="usernameError" class="error"></span>
            </div>
            <div class="my-3">
                <label for="" class="h7 form-label text-light">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                <span id="passwordError" class="error"></span>
            </div>
            <div class="button d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success ">Login</button>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="registration-page.php" class="text-white ">Don't have an account?</a>
            </div>
        </form>
    </div>
    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>