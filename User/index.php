<?php
session_start();
include('../connection.php');
include('../session.php');
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
        <input type="text" name="middle_name">
        <label for="">Destination To:</label>
        <input type="text" name="last_name">
        <label for="">Departure Date</label>
        <input type="date" name="depart_date">
        <label for="">Return Date</label>
        <input type="date" name="return_date">


        <label for="">How many person</label>

            <select name="pax" >
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
    $dateCreated = date("Y-m-d h:i:a");
    $dateUpdated = date("Y-m-d h:i:a");
}

//validation here di na sya makakapag book if yung userid is nakapag book na hihe


//query of booking




?>