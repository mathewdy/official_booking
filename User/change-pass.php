<?php

$conn = new mysqli("localhost", "root" , "", "booking_system");

if($conn == FALSE){
    echo "error";
}

session_start();
$email = $_SESSION['email'];
date_default_timezone_set('Asia/Manila');

if(empty($_SESSION['email'])){
    echo "<script>window.location.href='login.php' </script>";
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
    <form action = "change-pass.php" method = "POST">
        <div class="container  vh-100 text-center align-center mt-5 ">
        <div class="row">
            <div class="col-12">
            <label class="text-whitesmoke"   for="">Password</label>
            <input type="password" name="password" maxlength="25">

            <label class="text-whitesmoke"   for="">Confirm Password</label>
            <input type="password" name="new-password" maxlength="25">


            </div>
            <br>
            <div class="col-12 text-center align-center mt-5">
            <input type ="submit" name="submit" class="btn btn-primary" value="Change Pass">
            </div>
        </div>
        </div>
       



</form>
    </div>
   

    
</body>
</html>

<?php
if(isset($_POST['submit'])){

    $pass = $_POST['password'];
    $new_pass = $_POST['new-password'];
    $dateUpdated = date("Y-m-d h:i:a");
    $new_password = password_hash($pass,PASSWORD_DEFAULT);


    // checking 

    if(empty($pass)){

        echo "<script>alert('Please put  password')</script>";

    }

    elseif(empty($new_pass)){

        echo "<script>alert('Please put second password')</script>";

    }

    else{

        if($pass == $new_pass){
            //hashing 
            
    
            $pass_update = "UPDATE `users` SET `password`='$new_password',`date_time_updated`='$dateUpdated' WHERE email = '$email'";
            $run_update = mysqli_query($conn, $pass_update);
    
            if($run_update){
                session_destroy();
                unset($_SESSION['email']);
                echo "<script>window.location.href='login.php'</script>";
                exit();
            }

    
            else{
    
                echo "<script>Password is not match</script>";
    
            }
    
        }



    }



   

}
?>