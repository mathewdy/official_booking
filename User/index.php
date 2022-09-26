<?php
session_start();
$user_id = $_SESSION['user_id'];


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
        <input type="text" name="destination_from">
        <label for="">Destination To:</label>
        <input type="text" name="destination_to">
        <label for="">Departure Date</label>
        <input type="date" name="departure_date">
        


        <!----dapat eto mapupunta yung data neto sa guest--->
        <label for="">How many person</label>

            <select name="pax">
            <option value="0">-Select-</option>
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

    $destination_from = $_POST['destination_from'];
    $destination_to = $_POST['destination_to'];
    $pax = $_POST['pax'];

    //time nya mismo
    //echo "<br> " . "eto yung actual time : ";
    $time = time();
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
    $year = date('Y');
    $rand = rand(9999, 1111);

    If($pax == 0){
        echo '<script>alert("Please input a Pax")</script>' ;
    }
    
    if(empty($destination_from)){
        echo '<script>alert("Please input a destination from")</script>' ;
    }
    if(empty($destination_to)){
        echo '<script>alert("Please input a destination to")</script>' ;
    }

   if(empty($departure_date)){
        echo '<script>alert("Please input a departure date")</script>' ;
    }
   

  

   // validating of booking


  
    




// single booking 

    if($pax == 1){

        $query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`, `pax`, `date_time_created`) 
        VALUES ('$user_id', '$destination_from', '$destination_to', '$departure_date', '$return_date', '$pax' , '$dateCreated')";
        $run_query_book = mysqli_query($conn,$query_book);
      
        if($run_query_book){
            
          $user_id = $_SESSION['user_id'];
      
        }
      
        else{
      
          $conn->error;
        }
      
    }

    // two booking

    else if ($pax == 2 ){

       
        $user_id_2 = ($year.$rand);

        // validating of userid

    

    }

    else if ($pax == 3 ){
        $user_id_2 = ($year.$rand);
        $user_id_3 = ($year.$rand);

        // validating of userid

    }

    else if ($pax == 4 ){
        $user_id_2 = ($year.$rand);
        $user_id_3 = ($year.$rand);
        $user_id_4 = ($year.$rand);

        // validating of userid


    }

  





    
}






?>