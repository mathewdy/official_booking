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
        
            <h3> Please fill up the form for Guest 2 </h3>
            <label for="">First name</label>
            <input type="text" name="phase_3_fname">
            <br>
            <label for="">Middle name</label>
            <input type="text" name="phase_3_mname" >
            <br>
            <label for="">last name</label>
            <input type="text" name="phase_3_lname">
            <br>
            <label for="">Birthday</label>
            <input type="date" name="phase_3_bday">
            <br>
            <label for="">Contact Number</label>
            <input type="number" name="phase_3_cnum">
            <br>
            <label for="">Email</label>
            <input type="email" name="phase_3_email">
            <br>

            <h3> Please fill up the form for Guest 3 </h3>
            <label for="">First name</label>
            <input type="text" name="phase_4_fname">
            <br>
            <label for="">Middle name</label>
            <input type="text" name="phase_4_mname" >
            <br>
            <label for="">last name</label>
            <input type="text" name="phase_4_lname">
            <br>
            <label for="">Birthday</label>
            <input type="date" name="phase_4_bday">
            <br>
            <label for="">Contact Number</label>
            <input type="number" name="phase_4_cnum">
            <br>
            <label for="">Email</label>
            <input type="email" name="phase_4_email">
            <br>

            <input type="submit" name="phase4_submit" value="Submit">
            </form>
</body>
</html>

    
<?php
if(isset($_POST['phase4_submit'])){

    //guest 1

    $phase_2_fname = $_POST['phase_2_fname'];
    $phase_2_mname = $_POST['phase_2_mname'];
    $phase_2_lname = $_POST['phase_2_lname'];
    $phase_2_bday = $_POST['phase_2_bday'];
    $phase_2_cnum = $_POST['phase_2_cnum'];
    $phase_2_email = $_POST['phase_2_email'];

    // guest 2 

    $phase_3_fname = $_POST['phase_3_fname'];
    $phase_3_mname = $_POST['phase_3_mname'];
    $phase_3_lname = $_POST['phase_3_lname'];
    $phase_3_bday = $_POST['phase_3_bday'];
    $phase_3_cnum = $_POST['phase_3_cnum'];
    $phase_3_email = $_POST['phase_3_email'];


    //guest 3 

    $phase_4_fname = $_POST['phase_4_fname'];
    $phase_4_mname = $_POST['phase_4_mname'];
    $phase_4_lname = $_POST['phase_4_lname'];
    $phase_4_bday = $_POST['phase_4_bday'];
    $phase_4_cnum = $_POST['phase_4_cnum'];
    $phase_4_email = $_POST['phase_4_email'];

    $dateCreated = date("Y-m-d h:i:s");
    $dateUpdated = date("Y-m-d h:i:s");

     $year = date('Y');
     $rand = rand(9999, 1111);

    // guest 1
     $guest_id = ($year.$rand);
     
     //guest 2 id
     $guest_id_2 = ($year.$rand);

     $guest_id_2++;


     $guest_id_3 = ($year.$rand);

     $guest_id_3 +=2;

    // validation of guest id_1
    $validation_guest_id_1 = "SELECT `guest_id` FROM `guests` WHERE guest_id = '$guest_id'";
    $run_validation_guest_id_1 = mysqli_query($conn,$validation_guest_id_1);

    //validation of guest id_2
    $validation_guest_id_2 = "SELECT `guest_id` FROM `guests` WHERE guest_id = '$guest_id_2'";
    $run_validation_guest_id_2 = mysqli_query($conn,$validation_guest_id_2);


    //validation of guest id_3
    $validation_guest_id_3 = "SELECT `guest_id` FROM `guests` WHERE guest_id = '$guest_id_3'";
    $run_validation_guest_id_3 = mysqli_query($conn,$validation_guest_id_3);


    if(mysqli_num_rows($run_validation_guest_id_1) > 0){


            //generate another user id
            $guest_id = ($year.$rand);


    }

    if(mysqli_num_rows($run_validation_guest_id_2) > 0){
          //generate another user id
          $guest_id_2 = ($year.$rand);

    }

    if(mysqli_num_rows($run_validation_guest_id_3) > 0){
        //generate another user id
        $guest_id_3 = ($year.$rand);

    }


    else{
            //validation of guest 1 
        $validation_reg_guest_1 = "SELECT  `first_name`, `middle_name`, `last_name`, `email` FROM 
        `guests` WHERE email = '$phase_2_email' ";
        $validate_guest_1 = mysqli_query($conn,$validation_reg_guest_1);

        //validation of guest 2 
        $validation_reg_guest_2 = "SELECT  `first_name`, `middle_name`, `last_name`, `email` FROM 
        `guests` WHERE email = '$phase_3_email' ";
        $validate_guest_2 = mysqli_query($conn,$validation_reg_guest_2);


        //validation of guest 3 
        $validation_reg_guest_3 = "SELECT  `first_name`, `middle_name`, `last_name`, `email` FROM 
        `guests` WHERE email = '$phase_4_email' ";
        $validate_guest_3 = mysqli_query($conn,$validation_reg_guest_3);
    
            //validation of guest 1
        if(mysqli_num_rows($validate_guest_1) > 0){
            echo "<script>alert('The email has already taken in guest 1')</script>";
            
    
        }

        
            //validation of guest 2 
        else if(mysqli_num_rows($validate_guest_2) > 0){
            echo "<script>alert('The email has already taken in guest 2 ')</script>";
        }
            //validation of guest 3 
        else if(mysqli_num_rows($validate_guest_3) > 0){
            echo "<script>alert('The email has already taken in guest 3 ')</script>";
        }


        else{
            $guest_query_1 = "INSERT INTO `guests`(`user_id`, `guest_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `contact_number`, `email`, `date_time_created`) 
            VALUES ('$user_id','$guest_id','$phase_2_fname' , '$phase_2_mname','$phase_2_lname ','$phase_2_bday','$phase_2_cnum','$phase_2_email','$dateCreated')";
        
            $run_guest_query_1 = mysqli_query($conn,$guest_query_1);

            $guest_query_2 = "INSERT INTO `guests`(`user_id`, `guest_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `contact_number`, `email`, `date_time_created`) 
            VALUES ('$user_id','$guest_id_2','$phase_3_fname' , '$phase_3_mname','$phase_3_lname ','$phase_3_bday','$phase_3_cnum','$phase_3_email','$dateCreated')";

            $run_guest_query_2 = mysqli_query($conn,$guest_query_2);

            $guest_query_3 = "INSERT INTO `guests`(`user_id`, `guest_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `contact_number`, `email`, `date_time_created`) 
            VALUES ('$user_id','$guest_id_3','$phase_4_fname' , '$phase_4_mname','$phase_4_lname ','$phase_4_bday','$phase_4_cnum','$phase_4_email','$dateCreated')";

            $run_guest_query_3 = mysqli_query($conn,$guest_query_3);
        
        
        
            if($run_guest_query_1 && $run_guest_query_2 && $guest_query_3  ){
                      
            echo "<script>alert('Successful booking')</script>";
            echo"<script>window.location.href='payment.php' </script>";

            //landing page for paypal

           
          } 
        
        
          else{
        
            $conn->error;
          }
        }

    }


   


    


   
}
?>

    









