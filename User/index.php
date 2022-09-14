<?php
session_start();
include('../connection.php');
// tinanggal ko yung session para makapasok ako sa loob

//lagay mo dito yung echo "$user_id = $_SESSION['user_id'];"
// para ma fetch dito sa database;
date_default_timezone_set('Asia/Manila');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>



    <h1> DESIGN </h1>

    <a href="logout.php">Logout</a>



    <!-- KAILANGAN NAKA MODAL TO PARA SA BOOKING  -->

<!--  PARA SA MGA GUEST  -->

    <!-- PARA SA MGA MAY EMAIL NA -->
    <form action="index.php" method = "POST"> 

        <label for="">Destination From:</label>
        <input type="text" name="destination_from">
        <label for="">Destination To:</label>
        <input type="text" name="destination_to">
        <label for="">Departure Date</label>
        <input type="date" name="departure_date">
        


        <!----dapat eto mapupunta yung data neto sa guest--->
        <label for="">How many person</label>

            <select name="pax">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>




        <input type="submit" name="book" value="Book">

    </form> 

</body>
</html>

<?php

if(isset($_POST['book'])){
    date_default_timezone_set('Asia/Manila');

    $user_id = "123";

    $destination_from = $_POST['destination_from'];
    $destination_to = $_POST['destination_to'];

    //time nya mismo
    //echo "<br> " . "eto yung actual time : ";
    echo $time = time() ;
    //echo "<br>";
    //echo "selected date :";
    $departure_date = $_POST['departure_date'];
    //echo $departure_date;
    //echo "<br>";
    //echo "date in 3 days :";
    //date in 3 days

    $time_3 = $time + 60  * 60 * 24 * 3;
    $return_date = date("Y-m-d H:i:s", $time_3);

    
    $dateCreated = date("Y-m-d h:i:s");
    $dateUpdated = date("Y-m-d h:i:s");


    $query_insert = "INSERT INTO books ('user_id', 'destination_from' ,'destination_to', 'departure_date', 'return_date', 'date_time_created', 'date_time_updated') VALUES ('$user_id', '$destination_from','$destination_to', '$departure_date', '$return_date', '$dateCreated' , '$dateUpdated')";
    $run_insert = mysqli_query($conn,$query_insert);

    if($run_insert) {
        echo "added to book";
    }else{
        echo "error . " .  $conn->error;
    }







    
}

//validation here di na sya makakapag book if yung userid is nakapag book na hihe


//query of booking




?>