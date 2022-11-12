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
    <title>Promos</title>
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
            <a class="nav-link" href="home.php">Home</a>
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
<div class="container p-5">
    <form action="#" method="POST" class="">
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 card p-5 shadow" style="border: none;">
                <div class="row">
                    <div class="col-lg-2 text-xxl-end text-lg-end">
                        <label>Places</label>
                    </div>
                    <div class="col-lg-10 mb-3">
                        <input type="text" name="name_of_place" class="form-control py-1" placeholder="Name of Place">
                        <input type="file" class=" mb-1" name="places">
                    </div>
                    <div class="col-lg-2 text-xxl-end text-lg-end">
                        <label>Amenities</label>
                    </div>
                    <div class="col-lg-10 mb-3">
                        <input type="text" name="amenities" class="form-control py-1">
                    </div>
                    <div class="col-lg-2 text-xxl-end text-lg-end">
                        <label>Inclusions</label>
                    </div>
                    <div class="col-lg-10 mb-3">
                        <input type="text"  name="inclusions" id="inclusions" class="form-control py-1">
                    </div>
                    <div class="col-lg-2 text-xxl-end text-lg-end">
                        <label>Exclusions</label>
                    </div>
                    <div class="col-lg-10 mb-3">
                        <input type="text"  name="exclusions" class="form-control py-1">
                    </div>
                    <div class="col-lg-2 text-xxl-end text-lg-end">
                        <label>Days</label>
                    </div>
                    <div class="col-lg-10 mb-3">
                        <input type="text"  name="days" class="form-control py-1">
                    </div>
                    <div class="col-lg-2 text-xxl-end text-lg-end">
                        <label>Price</label>
                    </div>
                    <div class="col-lg-10 mb-4">
                        <input type="text"  name="price" class="form-control py-1">
                    </div>
                    <div class="col-lg-12 text-end">
                        <input type="submit" class="btn btn-sm btn-primary px-4" name="submit"> 
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php 
   include('../connection.php');

   if(isset($_POST['submit']))
   {
    $fileName = $_FILES['places']['name'];

    $place = $_POST['name_of_place'];
    $amenities = $_POST['amenities'];
    $inlcusion = $_POST['inclusions'];
    $exlcusions = $_POST['exclusions'];
    $days = $_POST['days'];
    $price = $_POST['price'];

    // $validate_img_extension = $_FILES['places']['type']=='image/jpg' || $_FILES['places']['type']=='image/png' || $_FILES['places']['type']=='image/jpeg';

    $img_types = array('img/jpg','image/png','image/jpeg');
    $validate_img_extension = in_array($_FILES['places']['type'],$img_types);


    if($validate_img_extension)
    {
        if(file_exists("uploads/".$_FILES['places']['name']))
        {
            $store = $_FILES['places']['name'];
            echo "Image already exist".$store;

        }
        else
        {
            $sql = "INSERT INTO promos(place,name_of_place,amenities, inclusions, exclusions, days, price) VALUES('$fileName' ,'$place','$amenities','$inlcusion', '$exlcusions','$days','$price')";
            $query_run = mysqli_query($conn, $sql);
            header("location:promos.php?uploadsuccess");

            if($query_run){
                move_uploaded_file($_FILES['places']['tmp_name'], "uploads/".$_FILES['places']['name']);
                echo "<script>alert('faculty added')</script>";
                header('location: promos.php');
            }
            else{
                echo "Error".$sql."<br>".$conn->error;
            }

        }

    }
    
    else{
        echo "only jpgs jpegs, pngs";
    }
}


        

?>
<script src="../src/styles/bs-5/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../src/styles/bs-5/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>