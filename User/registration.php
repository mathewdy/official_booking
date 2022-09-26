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
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Registartion</title>
</head>
<body class="bg-dark-accent">
<div class="container">
        <div class="row gy-4 d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-5 col-sm-12 ">
                <div class="card bg-bright-dark-accent" style="border:none; border-radius: 30px;">
                    <form action="registration.php" class="bg-bright-dark-accent px-4 py-2"  style="border:none; border-radius: 25px;" method="POST">
                        <div class="row g-4 p-2" style="border:none;">
                            <div class="col-lg-12">
                                <h2 class="display-6 text-white pb-2" style="font-size: 2em; font-weight: 300; ">Sign Up</h2>
                                <input type="text" name="first_name"  class="form-control py-2" placeholder="First Name">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="middle_name" class="form-control py-2" placeholder="Middle Name">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="last_name" class="form-control py-2" placeholder="Last Name">
                            </div>
                            <div class="col-lg-12">
                                <input placeholder="Date of birth" class="form-control py-2"  name="date_of_birth" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                            </div>
                            <div class="col-lg-12">
                                <!-- lagyan ito ng max input hanggang 10 lang at 0 lagi ang umpisa  -->
                                <input type="number" name="contact_number" class="form-control py-2" placeholder="Contact Number"> 
                            </div>
                            <div class="col-lg-12">
                                <input type="email"  name="email" class="form-control py-2" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <input type="password"  name="password" class="form-control py-2" placeholder="Password">
                            </div>
                            <div class="col-lg-12 text-center d-flex flex-column align-items-center">
                                <input type="submit" class="btn btn-pink text-white text-center w-50 py-2 mb-2" name="registartion" value="Register">
                                <a href="login.php" class="h6 link text-whitesmoke w-100 mb-2">Already have an account?</a>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
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