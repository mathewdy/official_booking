<?php
session_start();
$_SESSION['admin'];
unset($_SESSION['admin']);
session_destroy();

header("location: index.php");

?>