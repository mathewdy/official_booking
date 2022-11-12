<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Proof of Payment</title>
</head>
<body class="bg-slate-500">
<nav class="navbar navbar-dark bg-dark">
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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Image</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Lastname</th>
            <th>Contact Number</th>
            <th>Email</th>

        </tr>
    </thead>

    <tbody>
        <?php
        include('../connection.php');

        $Querytable = "SELECT pay.id, pay.user_id, pay.proof_of_payment, u.first_name, u.middle_name, u.last_name, u.contact_number, u.email FROM payments_tbl AS pay LEFT JOIN users As u ON pay.user_id = u.user_id";
        $Queryrun = mysqli_query($conn, $Querytable);

        while($Row = mysqli_fetch_assoc($Queryrun)){
            ?>

            <tr>
                <td><?php echo $Row['id']?></td>
                <td><?php echo $Row['user_id']?></td>
                <td>
                <?php echo '<img src="Proof_Payment/'.$Row['proof_of_payment'].'" width="100px"; height:"100px;"' ?>
                </td>
                <td><?php echo $Row['first_name']  ?></td>
                <td><?php echo $Row['middle_name']?></td>
                <td><?php echo $Row['last_name']?></td>
                <td><?php echo $Row['contact_number']?></td>
                <td><?php echo $Row['email']?></td>
                <td>
                    <form action="delete_payment.php" method="POST">
                        <input type="hidden" 
                        name="delete_id"
                        value="<?php echo $Row['id']?>">

                        <button type="submit"
                        name="delete_payment">Delete

                    </form>
                </td>
            </tr>


<?php
        }

        ?>

    </tbody>
</table>
    <script src="../src/styles/bs-5/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../src/styles/bs-5/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>