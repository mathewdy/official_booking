<?php   
include('connection.php');
session_start();

if(session_destroy()){
unset($email);
unset($_SESSION['otp']);
header("Location: forgot-pass.php");
exit();
}
?>