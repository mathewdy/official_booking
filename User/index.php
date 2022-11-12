<?php
session_start();
$user_id = $_SESSION['user_id'];
$contact_number = $_SESSION['contact_number'];

include('../connection.php');
include('../session.php');

 

 
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
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>  
<div class="container p-5">
    <div class="wrapper py-3 text-end">
        <a href="#" class="btn btn-sm btn-primary text-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Send Proof of Payment</a>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 display-6" style="font-weight: 500;" id="exampleModalLabel">Proof of payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="send_proof_payment.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-start">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Email</label>
                            </div>
                            <div class="col-lg-9 mb-3">
                                <input type="email" name="email" class="form-control py-1">
                            </div>
                            <div class="col-lg-3">
                                <label>Photo</label>
                            </div>
                            <div class="col-lg-9 mb-3">
                                <input type="file" name="bill" class="form-control py-1">
                            </div>
                            <div class="col-lg-3">
                                <label>Your Name</label>
                            </div>
                            <div class="col-lg-9 mb-3">
                                <input type="text" name="person_name" class="form-control py-1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit"> 
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive card">
        <table class="table">
            <thead>
                <tr>
                <th>Place</th>
                <th scope="col">Name of place</th>
                <th>Amenities</th>
                <th>Inclusions</th>
                <th>Exclusions</th>
                <th>Days</th>
                <th>Price</th>
                <th>Actions</th>

                </tr>
            
            </thead>
            <tbody>
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
                <tr>
                    <td>
                        <?php echo '<img src="uploads/'.$row['place'].'" width="100px"; height:"100px;"' ?>
                    </td>
                
                    <td><?php echo $row['name_of_place']?></td>
                    <td><?php echo $row['amenities']?></td>
                    <td><?php echo $row['inclusions']?></td>
                    <td><?php echo $row['exclusions']?></td>
                    <td><?php echo $row['days']?></td>
                    <td><?php echo $row['price']?></td>
                    <td>
                    <a href="<?php echo $book_link ?>"> Book</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
   </div>
</div>



    <script src="../src/styles/bs-5/@popperjs/core/dist/umd/popper.js"></script>
    <script src="../src/styles/bs-5/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

<?php







?>