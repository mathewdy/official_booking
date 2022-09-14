<?php
include('../connection.php');
    // require 'PHPmailer/PHPMailerAutoload.php';
    // $mail = new PHPMailer;

    // $mail->isSMTP();
    // $mail->Host ='smtp.gmail.com';
    // $mail->SMTPAuth = true;
    // $mail->Port = 587;
    // $mail->SMTPAuth=true;
    // $mail->SMTPSecure='tls';

    // $mail->Username='anthonyyuvega09@gmail.com';
    // $mail->Password='dhwzfnnwtoimheqi';
    // // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   

    // $mail->SetFrom('anthonyyuvega09@gmail.con');
    // $mail->addAddress($email);

    // $mail->isHTML(true);
    // $mail->Subject = "OTP";
    // $mail->Body = "This is a test";

    // $mail->send();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMialer\PHPMailer\Exception;

    require 'PHPmailer/src/Exception.php';
    require 'PHPmailer/src/PHPMailer.php';
    require 'PHPmailer/src/SMTP.php';

    if(isset($_POST['submit']))
    {
        $mail = new PHPMailer;
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anthonyyuvega09@gmail.com';
        $mail->Password = 'dhwzfnnwtoimheqi';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('anthonyyuvega09@gmail.com');
        
        $mail->addAddress($_POST['email']);

        $mail->isHTML(true);

        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];

        $mail->send();

        echo "
        <script>
        alert('Sent Successfully);
        </script>";
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
    
<form action="#" method="POST">

<label>Email</label>
<input type="email" name="email">

<label>Subject</label>
<input type="text" name="subject">

<label>Body</label>
<input type="text" name="message">

<input type="submit" name="submit" value="submit">
</form>



</body>
</html>

<?php 

?>