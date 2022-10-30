<?php
session_start();
$user_id = $_SESSION['user_id'];
echo $contact_number = $_SESSION['contact_number'];

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
    <title>Home</title>
</head>
<body>



    <h1> Home </h1>

    <a href="logout.php">Logout</a>
    <a href="send_proof_payment.php">Proof payment</a>


    <table>
  
    <thead>
        <tr>
        <th>Place</th>
        <th>Name of place</th>
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
   



</body>
</html>

<?php







?>