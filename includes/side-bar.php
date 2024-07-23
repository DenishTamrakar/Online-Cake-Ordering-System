<div id="side-bar" class="side-bar mh-100" style="background-color:#515151;width:40vh;">
    <div class="d-flex justify-content-between">
        <a href="../user/customer-care.php" class="btn btn-outline-light m-3 mx-3"><i class="fa-regular fa-user p-2"></i> </a>
        <a href="../logout.php" class="btn btn-outline-light m-3 mx-3"><i class="fa-solid fa-right-from-bracket p-2"></i></span></a>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <img src="../img/gaming.png" alt="" class="rounded-circle mt-3" height="80px" width="80px">
    </div>
    <div class="h5 text-white d-flex justify-content-center align-items-center ">
        <?php
        echo $_SESSION['username'];
        ?>
    </div>
    <div class="h6 text-white d-flex justify-content-center align-items-center">
        <?php
        echo $_SESSION['email'];
        ?>
    </div>
    <div class="h6 text-white d-flex justify-content-center align-items-center">
        Balance:
        <?php
        echo $_SESSION['balance'];
        ?>
    </div>
    <style>
        #list-group div {
            text-decoration: none;
            border-radius: 5px;
            color: white;
            transition: background-color 0.5s ease;
        }

        #list-group div:hover {
            text-decoration: none;
            color: #515151;
            border-radius: 5px;
            background-color: white;
        }
    </style>
    <div class="list-group m-3 text-white mt-4" id="list-group" style="background-color:#515151;">
        <a href="home.php" class="text-decoration-none">
            <div class="d-flex justify-content-center px-4 py-2 my-1">Cakes</div>
        </a>
        <a href="order-details.php" class="text-decoration-none">
            <div class="d-flex justify-content-center px-4 py-2 my-1">Orders</div>
        </a>
        <a href="card-query.php" class="text-decoration-none">
            <div class="d-flex justify-content-center px-4 py-2 my-1">Balance</div>
        </a>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
