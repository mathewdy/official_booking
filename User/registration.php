<?php

include('../connection.php');
date_default_timezone_set('Asia/Manila');

ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registartion</title>
</head>
<body>
    <form action="registration.php" method="POST">

        <label for="">First Name</label>
        <input type="text" name="first_name">
        <label for="">Middle Name</label>
        <input type="text" name="middle_name">
        <label for="">Last Name</label>
        <input type="text" name="last_name">
        <label for="">Date of Birth</label>
        <input type="date" name="date_of_birth">
        <!-- lagyan ito ng max input hanggang 10 lang at 0 lagi ang umpisa  -->
        <label for="">Contact Number</label>
        <input type="number" name="contact_number"> 
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Password</label>
        <input type="password" name="password">
        
        <input type="submit" name="registartion" value="Register">
    </form>
</body>
</html>

<?php
if(isset($_POST['registartion'])){
    
    
    $dateCreated = date("Y-m-d h:i:a");
    $dateUpdated = date("Y-m-d h:i:a");

            $year = date('Y');
            $rand = rand(9999, 1111);
            $user_id = ($year.$rand);

            


    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //hashing
    $new_password = password_hash($password,PASSWORD_DEFAULT);
            

    //validation of userid


    $validation_id = "SELECT `user_id` FROM `users` WHERE user_id = '$user_id'";
    $validate_userid = mysqli_query($conn,$validation_id);


    if(mysqli_num_rows($validate_userid) > 0){


            //generate another user id
        $user_id = ($year.$rand);


    }


    else{


        // validation of user


        $validation_reg = "SELECT  `first_name`, `middle_name`, `last_name`, `email` FROM 
    `users` WHERE email = '$email' ";
    $validate = mysqli_query($conn,$validation_reg);

    if(mysqli_num_rows($validate) > 0){
        echo "<script>alert('The email has already taken')</script>";
        echo "<script>window.location.href='login.php' </script>";

    }

    else {


        //insert of registartion



        $insert_registration = "INSERT INTO  `users`(`user_id`,`first_name`, `middle_name`, `last_name`, `birthday`, `contact_number`, `email`, `password`, `date_time_created`) 
        VALUES ('$user_id','$first_name','$middle_name', '$last_name','$date_of_birth', '$contact_number', '$email', '$new_password', '$dateCreated')";
    
            $run_insert_registration = mysqli_query($conn,$insert_registration);
    
            if($run_insert_registration){
        
                
            
                

                $insert_reset = "INSERT INTO `reset_passwords`(`email`,`date_time_created`) VALUES ('$email','$dateCreated')";
                $run_insert_reset=mysqli_query($conn,$insert_reset);
                
                if($run_insert_reset){


                    echo"<script>window.location.href='login.php' </script>";

                }

                else {

                    $conn->error;
                }
                
               
        
            }
        
            else{
                $conn->error;
            }
        

    }


    }


            
    



    
    


}
ob_end_flush();

?>