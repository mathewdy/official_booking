<?php
session_start();
$user_id = $_SESSION['user_id'];
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
    <title>Booking</title>
</head>
<body>


            <form action="" method="POST">
            <h3> Please fill up the form for Guest 1 </h3>
            <label for="">First name</label>
            <input type="text" name="phase_2_fname">
            <br>
            <label for="">Middle name</label>
            <input type="text" name="phase_2_mname" >
            <br>
            <label for="">last name</label>
            <input type="text" name="phase_2_lname">
            <br>
            <label for="">Birthday</label>
            <input type="date" name="phase_2_bday">
            <br>
            <label for="">Contact Number</label>
            <input type="number" name="phase_2_cnum">
            <br>
            <label for="">Email</label>
            <input type="email" name="phase_2_email">
            <br>
            <input type="submit" name="phase2_submit" value="Submit">
            </form>
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
                      
            echo "<script>alert('Successful booking')</script>";
            echo"<script>window.location.href='payment.php' </script>";
        
          }
        
          else{
        
            $conn->error;
          }
        }

    }


   
}
?>

    









