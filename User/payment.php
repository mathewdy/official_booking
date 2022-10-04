<?php
session_start();
$user_id = $_SESSION['user_id'];

$destination_from = $_SESSION['destination_from'];
$pax = $_SESSION['pax '];
$departure_date = $_SESSION['departure_date'];
$return_date = $_SESSION['return_date'];
$place = $_SESSION['place'];

include('../connection.php');
include('../session.php');
date_default_timezone_set('Asia/Manila');


$query = "SELECT `name_of_place`, `price` FROM `promos` WHERE name_of_place = '$place'";
$run_query = mysqli_query($conn,$query);
if(mysqli_num_rows($run_query)> 0){
    $row = mysqli_fetch_array($run_query);
    $price = $row['price'];
    $total = $pax * $price;
}



 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>

    <form action = "" method="POST">

    <h1>Book details</h1>
        
        <label for="">Destination From:</label>
        <input type="text" name="destination_from" value=" <?php echo "$destination_from" ?>" readonly>
        <br>
        <label for="">Destination To:</label>
        <input type="text"  value="<?php if($place == $place) { echo "$place"; } else {"";} ?>" readonly>
        <br>
        <label for="">Departure Date</label>
        <input type="text" name="departure_date" value=" <?php echo "$departure_date" ?>" readonly>
        <br>
        <label for="">Return Date </label>
        <input type="text" name="return_date" value=" <?php echo "$return_date" ?>"readonly>
        <br>

        <label for="">Price</label>
        <input type="text" name="return_date" value=" <?php echo "$total" ?>"readonly>

        <input type="submit" name="book" value="Book">

    </form>


<div id="paypal-button-container"></div>
    

<script src="https://www.paypal.com/sdk/js?client-id=AQXfZKGVELgJp5xNfCfDZAWZLrd_Ikf79I2M9Nt9Iqw5oTX7xyVnOBGp6oHsZbLQxFx2BymiPmWnAkvU"></script>
<script>
      paypal.Buttons().render('#paypal-button-container');
    </script>
</body>
</html>


<?php

if(isset($_POST['book'])){

    $dateCreated = date("Y-m-d h:i:s");
    $dateUpdated = date("Y-m-d h:i:s");
 
    // na comment muna ang query para un comment nalang pag okay na ang paypall
    // wag kalimutan tanggalin ang session ng mga nasa taas 
    // $query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`, `date_time_created`,`date_time_updated`) 
    // VALUES ('$user_id', '$destination_from', '$place', '$departure_date', '$return_date', '$dateCreated', ' $dateUpdated')" ;
    // $run_query_book = mysqli_query($conn,$query_book);
  
    
  
    // if($run_query_book){
  
    //     echo "<script>alert('Sucessful book')</script>";
  
    //   header("index.php");    
      
  
    // }
  
    // else{
  
    //   $conn->error;
    // }
  

}

?>