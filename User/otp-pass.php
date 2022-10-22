<?php
include('../connection.php');
session_start();
date_default_timezone_set('Asia/Manila');


$email = $_SESSION['email'];




if(empty($email)){
            echo "<script>window.location.href='forgot-pass.php' </script>";
        }
    


        //otp has done 

$timestamp =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
if(($timestamp - $_SESSION['time']) > 300)  // 5 minutes refers to 300 seconds
{

    $update_reset = "UPDATE `reset_passwords` SET `code`= ' ',`date_time_updated`='' WHERE email = '$email' ";
  $run_update = mysqli_query($conn,$update_reset);
echo '<script>alert("Your otp has been expired")</script>' ; 

    // delete the otp in the database and alert the person that the otp is expired
}




















    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Forgot Password</title>
</head>
<body class="bg-dark-accent">
    <div class="container mx-auto">
        <div class="col-lg-6 border">

        </div>
    <form action = "otp-pass.php" method = "POST">
        <div class="container  vh-100 text-center align-center mt-5 ">
        <div class="row">
            <div class="col-12">
            <label class="text-whitesmoke"   for="">OTP</label>
            <input type="number" name="otp">
            <a href="resend.php"></a>
            </div>
            <br>
            <div class="col-12 text-center align-center mt-5">
            <input type ="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>
        </div>
       



</form>
    </div>
   

    
</body>
</html>




</form>




</body>
</html>

<?php

if(isset($_POST['submit'])){

    $otp = $_POST['otp'];

    
    
    
    $query = "SELECT email, code FROM reset_passwords WHERE email = '$email'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($otp, $row['code'])){ 
                unset($_SESSION['otp']);
                header("location: change-pass.php");
                 die();

            } 
            else{
                echo '<script>alert("Incorrect credentials")</script>' ; 
            }

    
    
    
    
        }
    
    
    
    
    
    
    
    
    
    
    }
    
    
    
    
    
    
}
    



?>


