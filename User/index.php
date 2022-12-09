<?php
session_start();
$user_id = $_SESSION['user_id'];
$contact_number = $_SESSION['contact_number'];

$conn = new mysqli("localhost", "root" , "", "booking_system");
 if(empty($_SESSION['email'])){
        echo "<script>window.location.href='login.php' </script>";
    }
    if(empty($user_id)){
        echo "<script>window.location.href='login.php' </script>";
    }

 

 
date_default_timezone_set('Asia/Manila');




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
<nav class="navbar navbar-expand-lg bg-bright-dark-accent navbar-dark">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#"></a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
            <!-- <li><a class="dropdown-item" href="">History</a></li> -->
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>  
<div class="container">
<div class="card bg-bright-dark-accent mt-5" style="border-radius: 0; background: #393E46;">
        <div class="row">
            <?php

                $sql = "SELECT * FROM promos ORDER BY id DESC ";
                $run = mysqli_query($conn,$sql);

                if(mysqli_num_rows($run) > 0){
                    $count = 0;
                    foreach($run as $row){
                    $pid = $row['id'];
                    
                    // Store the cipher method
                    $ciphering = "AES-128-CTR";
                    $iv_length = openssl_cipher_iv_length($ciphering);
                    $options = 0;

                    // Non-NULL Initialization Vector for encryption
                    $encryption_iv = '1234567891011121';

                    // Store the encryption key
                    $encryption_key = "TeamAgnat";

                    // Use openssl_encrypt() function to encrypt the data
                    $encryption = openssl_encrypt($pid, $ciphering,
                                $encryption_key, $options, $encryption_iv);
                    //   $encrypted_data = (($lrn*12345678911*56789)/987654);
                    $book_link = "book.php?pid=" . $encryption;
                        $count++;
                ?>
                
                <div class="col-lg-4">
                    <div class="row ">
                        <div class="col-lg-12 p-md-5">
                            <?php echo '<img src="uploads/'.$row['place'].'" class="w-100" style="height: 150px; width:50px;">' ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="row w-100" style="color: rgba(255,255,255,0.6);">
                        <div class="col-lg-5">
                            <p><?php echo '<b>Place :</b> '. $row['name_of_place']?></p>
                            <p><?php echo '<b>Inclusion :</b> '. $row['inclusions']?></p>
                            <p><?php echo '<b>Exclusion :</b> '. $row['exclusions']?></p>
                        </div>
                        <div class="col-lg-5">
                            <p><?php echo '<b>Days :</b> '. $row['days']?></p>
                            <p><?php echo '<b>Amenities :</b> '. $row['amenities']?></p>
                            <p><?php echo '<b>Price :</b> '. $row['price']?></p>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end align-items-start">
                            <a href="<?php echo $book_link ?>" class="btn btn-sm px-5 btn-info-dark" style="border-radius: 0;"> Book</a>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>
        </div>
   </div>
</div>

    <script src="../popper.js"></script>
    <!-- <script src="../src/styles/bs-5/@popperjs/core/dist/umd/popper.js"></script> -->
    <script src="../src/styles/bs-5/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

<?php







?>