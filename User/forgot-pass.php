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
                $mail->Username   = 'teamagnat7@gmail.com';                     //SMTP username // email username
                $mail->Password   = 'tqgacspjvfsoynuj';                               //SMTP // email password password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->SetFrom('teamagnat7@gmail.com');
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
    <title>Forgot Password</title>
</head>
<body>
    <form action = "forgot-pass.php" method = "POST">

    <label for="">Email</label>
    <input type="email" name="email">

    <input type ="submit" name="submit" value="Submit">

    </form>


    
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