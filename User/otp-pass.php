<?php
include('../connection.php');
session_start();
date_default_timezone_set('Asia/Manila');


$email = $_SESSION['email'];



print_r($_SESSION['otp']);

if(empty($_SESSION['otp'])){
            echo "<script>window.location.href='forgot-pass.php' </script>";
        }
    


        //otp has done 

$timestamp =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
if(($timestamp - $_SESSION['time']) > 300)  // 300 refers to 300 seconds
{
    echo "otp expired";

    // delete the otp in the database and alert the person that the otp is expired
}

















// $timestamps =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
// print_r($timestamps );


// print_r( $_SESSION['time']);



//     
   
//     if(($_SESSION['time'] - $timestamps) < 60){


//         $update_reset = "UPDATE `reset_passwords` SET `code`='0',`date_time_updated`='' WHERE = '$_SESSION[email]' ";
//        $run_update = mysqli_query($conn,$update_reset);


//     }
//     else{
//         echo "<script>alert('Your OTP has been expired')</script>";
        

//     }

    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Pass</title>
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

    
    
    
    $query = "SELECT email, code FROM reset_passwords WHERE email = '$email'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($otp, $row['code'])){ 
                //fetch mo muna yung user id, para ma sessidon papunta sa kabila
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


