<?php   
session_start();
$user_id = $_SESSION['user_id'];

$destination_from = $_SESSION['destination_from'];
$pax = $_SESSION['pax'];
$departure_date = $_SESSION['departure_date'];
$return_date = $_SESSION['return_date'];
$place = $_SESSION['place'];

include('../connection.php');
include('../session.php');
date_default_timezone_set('Asia/Manila');



$dateCreated = date("Y-m-d h:i:s");
$dateUpdated = date("Y-m-d h:i:s");
 

$query = "SELECT `name_of_place`, `price` FROM `promos` WHERE name_of_place = '$place'";
$run_query = mysqli_query($conn,$query);
if(mysqli_num_rows($run_query)> 0){
    $row = mysqli_fetch_array($run_query);
    $price = $row['price'];
    $total = $pax * $price;
}

$query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`, `date_time_created`,`date_time_updated`) 
VALUES ('$user_id', '$destination_from', '$place', '$departure_date', '$return_date', '$dateCreated', ' $dateUpdated')" ;
$run_query_book = mysqli_query($conn,$query_book);


if($run_query_book){

unset($destination_from);
unset($user_id);
header("Location: invoice.php");
exit();

}

else{

  $conn->error;
}


?>