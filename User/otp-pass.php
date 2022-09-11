<?php
include('../connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

print_r($_SESSION['email']);

    if(empty($_SESSION['otp'])){
        echo "<script>window.location.href='forgot-pass.php' </script>";
    }

    // $timestamps =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
    // if(($timestamps - $_SESSION['time']) > 3000){


    //     $update_reset = "UPDATE `reset_passwords` SET `code`='0',`date_time_updated`='' WHERE = '$_SESSION[email]' ";
    //    $run_update = mysqli_query($conn,$run_update);


    // }
    // else{
    //     echo "<script>alert('Your OTP has been expired')</script>";
    //     echo "<script>window.location.href='forgot-pass.php' </script>";

    // }

    



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

<form action = "otp-pass.php" method = "POST" >

<label> OTP </label>
<input type = number name = "otp">
<input type = "submit" name = "submit" value = "Submit">


</form>




</body>
</html>

<?php

if(isset($_POST['submit'])){

    $otp = $_POST['otp'];

    if ($otp == $_SESSION['otp']) 
    {
        unset($_SESSION['otp']);
        echo "<script>window.location.href='change-pass.php' </script>";
       
    } 
    else {

        echo "<script>alert('Invalid otp')</script>";

    }
}
    



?>


