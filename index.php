<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body class="bg-black" style="background:url(img/h.jpg);background-repeat: no-repeat;
    background-size: cover;">
    <?php
        include 'includes/nav.php';
    ?>
    <div class="container d-flex justify-content-center align-items-center" style="height:86vh;">
        <div>
            <div class="h2 text-white">Welcome to Official Website of Dragon Bakery</div>
            <div class="text-white">Have a choice of your cake at your fingertips.</div>
            <div class="d-flex justify-content-center">
                <a href="login-page.php" class="btn btn-outline-light mt-5 mx-5 px-3" >Login</a>
                <a href="registration-page.php" class="btn btn-outline-light mt-5 mx-5 px-3" >Sign Up</a>
            </div>
        </div>
    </div>
    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>