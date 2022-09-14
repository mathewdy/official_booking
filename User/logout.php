<?php   
include('connection.php');
session_start();

if(session_destroy()){
unset($_SESSION['email']);
unset($user_id);
header("Location: login.php");
exit();
}

?>