<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
</head>

<body>
    <?php
    include '../includes/nav.php';
    ?>
    <div class="d-flex">
        <?php
        include '../includes/side-bar.php';
        ?>
        <div class="container-fluid">
            <div class="d-flex justify-content-center aling-items-center mt-5 h3">GET IN TOUCH</div>
            <hr>
            <div id="container" class="row">
                <div class="col border-end d-flex justify-content-center align-items-center flex-column">
                    <div class="image"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="h5">Address</div>
                    <div><strong>Dragon Bakery</strong></div>
                    <div>Lagankhel-12, Lalitpur</div>
                </div>
                <div class="col d-flex justify-content-center align-items-center flex-column">
                    <div class="image"><i class="fa-solid fa-phone"></i></div>
                    <div class="h5">Phone</div>
                    <div><strong>Dragon Bakery</strong></div>
                    <div>01-559129, 9809809809</div>
                </div>
                <div class="col border-start d-flex justify-content-center align-items-center flex-column">
                    <div class="image"><i class="fa-solid fa-envelope"></i></div>
                    <div class="h5">E-mail</div>
                    <div><strong>Dragon Bakery</strong></div>
                    <div>query@dragonbakery.in</div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>

</html>