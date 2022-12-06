<?php
session_start();
 $contact_number = $_SESSION['contact_number'];
$user_id = $_SESSION['user_id'];
$conn = new mysqli("localhost", "root" , "", "booking_system");

if($conn == FALSE){
    echo "error";
}

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
    <title>Registartion</title>
</head>
<body class="bg-dark-accent">
<div class="container">
    <a href="index.php">Cancel</a>
        <div class="row gy-4 d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-5 col-sm-12 ">
                <div class="card bg-bright-dark-accent" style="border:none; border-radius: 30px;">
                    <form action="" class="bg-bright-dark-accent px-4 py-2"  style="border:none; border-radius: 25px;" method="POST">
                        <div class="row g-4 p-2" style="border:none;">
                            <div class="col-lg-12">
                                <h2 class="display-6 text-white pb-2" style="font-size: 2em; font-weight: 300; ">Please fill up the form for Guest 1</h2>
                                <input type="text" name="phase_2_fname"  class="form-control py-2" placeholder="First Name" maxlength="25" >
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="phase_2_mname" class="form-control py-2" placeholder="Middle Name" maxlength="25">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="phase_2_lname" class="form-control py-2" placeholder="Last Name" maxlength="25">
                            </div>
                            <div class="col-lg-12">
                                <input placeholder="Date of birth" class="form-control py-2"  name="phase_2_bday" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                            </div>
                            <div class="col-lg-12">
                                <!-- lagyan ito ng max input hanggang 10 lang at 0 lagi ang umpisa  -->
                                <input type="number" name="phase_2_cnum" class="form-control py-2" placeholder="Contact Number" maxlength="25"> 
                            </div>
                            <div class="col-lg-12">
                                <input type="email"  name="phase_2_email" class="form-control py-2" placeholder="Email" maxlength="25">
                            </div>
                            <div class="col-lg-12 text-center d-flex flex-column align-items-center">
                                <input type="submit" class="btn btn-pink text-white text-center w-50 py-2 mb-2" name="phase2_submit" value="Register">
                            
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
if(isset($_POST['phase2_submit'])){
   
    
    $phase_2_fname = $_POST['phase_2_fname'];
    $phase_2_mname = $_POST['phase_2_mname'];
    $phase_2_lname = $_POST['phase_2_lname'];
    $phase_2_bday = $_POST['phase_2_bday'];
    $phase_2_cnum = $_POST['phase_2_cnum'];
    $phase_2_email = $_POST['phase_2_email'];
    $dateCreated = date("Y-m-d h:i:s");
    $dateUpdated = date("Y-m-d h:i:s");

     $year = date('Y');
     $rand = rand(9999, 1111);

     $guest_id = ($year.$rand);

    // validation of guest id
    $validation_guest_id_1 = "SELECT `guest_id` FROM `guests` WHERE guest_id = '$guest_id'";
    $run_validation_guest_id_1 = mysqli_query($conn,$validation_guest_id_1);


    if(mysqli_num_rows($run_validation_guest_id_1) > 0){


            //generate another user id
        $guest_id = ($year.$rand);


    }


    else{

        $validation_reg_guest_1 = "SELECT  `first_name`, `middle_name`, `last_name`, `email` FROM 
        `guests` WHERE email = '$phase_2_email' ";
        $validate_guest_1 = mysqli_query($conn,$validation_reg_guest_1);
    
        if(mysqli_num_rows($validate_guest_1) > 0){
            echo "<script>alert('The email has already taken')</script>";
            
    
        }


        else{
            $guest_query_1 = "INSERT INTO `guests`(`user_id`, `guest_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `contact_number`, `email`, `date_time_created`) 
            VALUES ('$user_id','$guest_id','$phase_2_fname' , '$phase_2_mname','$phase_2_lname ','$phase_2_bday','$phase_2_cnum','$phase_2_email','$dateCreated')";
        
            $run_guest_query_1 = mysqli_query($conn,$guest_query_1);
        
        
        
            if($run_guest_query_1){
                      
            echo"<script>window.location.href='payment.php' </script>";
        
          }
        
          else{
        
            $conn->error;
          }
        }

    }


   
}
?>

    









