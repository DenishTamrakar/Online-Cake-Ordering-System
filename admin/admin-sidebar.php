<div id="side-bar" class="side-bar mh-100" style="background-color:#515151;height:140vh;width:40vh;">
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
            <div class="d-flex justify-content-center px-4 py-2 my-1">Cake List</div>
        </a>
        <a href="order-details.php" class="text-decoration-none">
            <div class="d-flex justify-content-center px-4 py-2 my-1">Order Record</div>
        </a>
        <a href="user-details.php" class="text-decoration-none">
            <div class="d-flex justify-content-center px-4 py-2 my-1">Users</div>
        </a>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="../js/sidebar.js"></script>