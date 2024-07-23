<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-sm bg-black">
  <div class="container-fluid justify-content-between d-flex p-3">
    <a href="<?php
              session_start();
              if (!isset($_SESSION['user_id'])) {
                echo 'index.php';
              } else {
                echo 'home.php';
              }
              ?>" class="text-decoration-none text-white px-5 h-2 flex-grow-1">
      <h3>Dragon Bakery</h3>
    </a>
    <button class="navbar-toggler border border-white bg-light" type="button" data-bs-target="#aa" data-bs-toggle="collapse" style=".navbar-toggler border border-whitle:hover .navbar-nav{display: block;}"><span class="text-white navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse justify-content-end" id="aa">
      <?php
      if (isset($_SESSION['user_id'])) {
      ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../user/user-details.php" class=" nav-link text-light p-2">Profile</a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" class=" nav-link text-light p-2">Logout</a>
          </li>
        </ul>
      <?php
      } else {
      ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="login-page.php" class=" nav-link text-light p-2">Login</a>
          </li>
          <li class="nav-item">
            <a href="registration-page.php" class=" nav-link text-light p-2">Register</a>
          </li>
          <li class="nav-item">
            <a href="about.php" class=" nav-link text-light p-2">About</a>
          </li>
        </ul>
      <?php
      }
      ?>
    </div>
  </div>
</nav>