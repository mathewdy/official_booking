<?php

include('../connection.php');
ob_start();

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
    <form action="registration.php" method="POST">

        <label for="">First Name</label>
        <input type="text" name="first_name">
        <label for="">Middle Name</label>
        <input type="text" name="middle_name">
        <label for="">Last Name</label>
        <input type="text" name="last_name">
        <label for="">Date of Birth</label>
        <input type="date" name="date_of_birth">
        <label for="">Contact Number</label>
        <input type="number" name="contact_number">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Password</label>
        <input type="password" name="password">
        
        <input type="submit" name="registartion" value="Register">
    </form>
</body>
</html>

<?php
if(isset($_POST['registartion'])){
    
    date_default_timezone_set('Asia/Manila');
    $dateCreated = date("m-d-Y h:i:a");
    $dateUpdated = date("m-d-Y h:i:a");


    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}


?>