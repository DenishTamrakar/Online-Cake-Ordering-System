<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
    <title>Registration Page</title>
</head>

<body class="bg-dark">
    <?php
    include 'includes/nav.php';
    if (isset($_GET['value'])) {
        if ($_GET['value'] == 1) {
            echo "<div class='alert alert-danger alert-dismissible'  >
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>User already exists!</strong></div>";
        } elseif ($_GET['value'] == 2) {
            echo "<div class='alert alert-danger alert-dismissible'  >
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>The password that you entered is not valid. Your password must consist of atleast:
                <ul>
                    <li>8 characters.</li>
                    <li>Uppercase character.</li>
                    <li>Special character.</li>
                    <li>Number</li>
                </ul></strong></div>";
        } elseif ($_GET['value'] == 3) {
            echo "<div class='alert alert-success alert-dismissible'  >
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>User unable to Register!</strong></div>";
        }
    }
    ?>
    <div class="container d-flex justify-content-center align-items-center bg-dark" style="height:86vh;">
        <form id="registrationForm" onsubmit="return validateForm()" class="border border-light p-5 rounded" method="POST" action="registration.php">
            <div class="h2 mb-4 text-white">Registration</div>
            <div class="my-3">
                <label for="" class="h7 form-label text-light">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" required>
                <span id="usernameError" class="error"></span>
            </div>
            <div class="my-3">
                <label for="" class="h7 form-label text-light">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="e_mail" required>
                <span id="emailError" class="error"></span>
            </div>
            <div class="my-3">
                <label for="" class="h7 form-label text-light">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                <span id="passwordError" class="error"></span>
            </div>
            <div class="button d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success ">Submit</button>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="login-page.php" class="text-white ">Already have an account?</a>
            </div>
        </form>
    </div>
    <?php
    include 'includes/footer.php';
    ?>
    <script src="js/registration.js"></script>
</body>

</html>