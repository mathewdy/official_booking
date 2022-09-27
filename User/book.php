<?php
session_start();
$user_id = $_SESSION['user_id'];
include('../connection.php');
include('../session.php');
date_default_timezone_set('Asia/Manila');


if(isset($_GET['pid'])){
    
    // Store the cipher method
    $ciphering = "AES-128-CTR";
    $options = 0;
    // Non-NULL Initialization Vector for decryption
    $decryption_iv = '1234567891011121';
  
    // Store the decryption key
    $decryption_key = "TeamAgnat";
  
    // Use openssl_decrypt() function to decrypt the data
    $decrypted_pid=openssl_decrypt ($_GET['pid'], $ciphering,
        $decryption_key, $options, $decryption_iv);
    // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
    //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
    //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
    // }
      
      if(empty($_GET['pid'])){    //id of place verification starts here
          echo "<script>alert('Place not found');
          window.location = 'index.php';</script>";
          exit();
      } 

      else {

        $gen_place = "SELECT `id`, `name_of_place` FROM `promos` WHERE id = '$decrypted_pid'";
        $run_gen_place = mysqli_query($conn,$gen_place);

        if(mysqli_num_rows($run_gen_place) >0  ){
            while($row=mysqli_fetch_assoc($run_gen_place)){
            
              $place = $row['name_of_place'];
            
            }
        }
       
        
      }



      $verify_place = "SELECT `id` FROM `promos` WHERE id = '$decrypted_pid'";
      $run_verify_place = mysqli_query($conn,$verify_place);
      if(mysqli_num_rows($run_verify_place) == 0){
        echo "
        <script type = 'text/javascript'>
        window.location = 'index.php';
        </script>";
        exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

   
<!-- registration  -->



</head>
<body>
    
</body>
</html>

<?php

?>