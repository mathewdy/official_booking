<?php
include('../connection.php');


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer.php");
    require("SMTP.php");
    require("Exception.php");

//Load Composer's autoloader

//Create an instance; passing `true` enables exceptions






try {

    $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'thaddeusgamit31@gmail.com';                     //SMTP username // email username
                $mail->Password   = 'navydoeeuhkietor';                               //SMTP // email password password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->SetFrom('thaddeusgamit31@gmail.com');
                $mail->addAddress('thaddeusgamit31@gmail.com');
                      //Add a recipient
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "SF10 from PDMES";
                $mail->Body    = "SF10 for this specific student" ;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>