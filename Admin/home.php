<?php
session_start();

if(isset($_SESSION['admin'])){
    header("localhost:index.php?action=login");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Home</title>
</head>
<body class="bg-dark-accent">
<nav class="navbar navbar-dark bg-bright-dark-accent">
  <div class="container-fluid ">
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Admin Panel</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="UsersTable.php">Users</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Settings
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="admin_logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row p-5">
        <div class="col-xxl-12 py-5">
            <h2 class="display-6 text-light">Welcome <?php echo ucfirst($_SESSION['admin'])?></h2>
            <hr class="featurette-divider" style="background:white; border: 1px solid white;">
        </div>
        <div class="col-xxl-6">
            <div class="card bg-dark p-5 text-white">
                <p class="h1">Promo</p>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi sint natus, labore a quasi ducimus?</p>
                <span class="text-end">
                <a href="promos.php" class="text-white">Add Promo</a>
                </span>
            </div>
        </div>
        <div class="col-xxl-6">
            <div class="card bg-dark p-5 text-white">
                <p class="h1">Proof of payments</p>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi sint natus, labore a quasi ducimus?</p>
                <span class="text-end">
                <a href="Proof_of_payment.php" class="text-white">See More...</a>
                </span>
            </div>
        </div>
    </div>
    <!-- <a href="Proof_of_payment.php">Proof of payment</a> -->
</div>    
    <script src="../src/styles/bs-5/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../src/styles/bs-5/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>