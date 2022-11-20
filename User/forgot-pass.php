<?php
include('../connection.php');
session_start();





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    require ("PHPMailer.php");
    require("SMTP.php");
    require("Exception.php");



        function sendMail($email,$otp){

           
          
            
            

            
            try {
                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'thaddeusgamit31@gmail.com';    //don't forget the email                 //SMTP username // email username
                $mail->Password   = 'cqqerzfytpnocgev';     // passowrd                          //SMTP // email password password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->SetFrom('thaddeusgamit31@gmail.com');
                $mail->addAddress($email);
                      //Add a recipient
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "OTP";
                $mail->Body    = "This is your otp ".$otp." Please don't reply" ;
    
                $mail->send();
                return true;
            } 
            catch (Exception $e) {
                return false;
            }

    
   
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
    <form action = "forgot-pass.php" method = "POST">
        <div class="container  vh-100 text-center align-center mt-5 ">
        <div class="row">
            <div class="col-12">
            <label class="text-whitesmoke"   for="">Email</label>
            <input type="email" name="email" maxlength="25">

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

<?php
if(isset($_POST['submit'])){

    $email = $_POST['email'];

    $validation_reg = "SELECT `email` FROM `users` WHERE email = '$email' ";
    $validate = mysqli_query($conn,$validation_reg);

    if(mysqli_num_rows($validate) > 0){
        
        $otp = rand(9999, 1111);
         
        //hashing of otp

        $hashed_otp = password_hash($otp,PASSWORD_DEFAULT);
        
           if(sendMail($email,$otp)){

            $query_otp = "UPDATE `reset_passwords` SET `code`='$hashed_otp' WHERE email = '$email'";
            $send_query_otp = mysqli_query($conn,$query_otp);


            $timestamp =  $_SERVER["REQUEST_TIME"];  // generate the timestamp when otp is forwarded to user email/mobile.
            $_SESSION['time'] = $timestamp; 
            $_SESSION['email'] = $email;
            $_SESSION['otp'] = $otp;
            header("Location: otp-pass.php");

            // insert the database of the otp 
            
           }


           else{
             echo "<script>alert('Invalid Email')</script>";
           }

            

            
           
            


        

    

    }

    else{

        echo"invalid";

        

    }




}



?>