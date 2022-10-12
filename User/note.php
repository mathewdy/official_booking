<?php
include('../connection.php');


$query = "SELECT guest_id FROM guest WHERE user_id = '2022'"
$run_query = mysqli_query($conn,$query);


?>