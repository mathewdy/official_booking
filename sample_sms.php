<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Mobile Number</label>
        <input type="text" name="mobile_number">
        <label for="">Message</label>
        <input type="text" name="message">
        <input type="submit" name="send_sms" value="Send SMS">
    </form>
</body>
</html>
<?php
require_once __DIR__.'/vendor/autoload.php';

if(isset($_POST['send_sms'])){

    $mobile_number = $_POST['mobile_number'];
    $msg = $_POST['message'];

    $MessageBird = new \MessageBird\Client('RxMmhBj6lWcKOSqFQRAFg0Afh');
    $Message = new \MessageBird\Objects\Message();
    $Message->originator = '+639614507751';
    $Message->recipients = $mobile_number;
    $Message->body = $msg;
    
    $MessageBird->messages->create($Message);
    
}

?>