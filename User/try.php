<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPmailer/src/Exception.php';
require 'PHPmailer/src/PHPMailer.php';
require 'PHPmailer/src/SMTP.php';

if(isset($_POST['send'])){
$to_id = $_POST['toid'];

$subject =  $_POST['subject'];


$message = $_POST['message'];
$image = $_FILES['image']['tmp_name'];
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mathewdalisay@gmail.com';
$mail->Password = 'dproewbecisldhec';
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;
$mail->setFrom('mathewdalisay@gmail.com', 'Maris Travel & Tours agency by WCA');
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->addAttatchment($image, 'demo/image');

if(!$mail->send())


{


$error = "Mailer Error: " .$mail->ErrorInfo;


echo "<div class=display> '.$error.'  </div>";


}


else


{


echo " <div class=display> Message Sent </div>";


}




}


else


{


echo "<div class=display> Please Enter Valid Data </div>  ";


}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">email</label>
       <input type="text" name="toid">
       <label for="">subject</label>
       <input type="text" name="subject">
       <label for="">message</label>
       <input type="text" name="message">
       <label for="">image</label>
       <input type="file" name="image"> 
       <input type="submit" name="send" value="send">
    </form>
</body>
</html>