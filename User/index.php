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



    <h1> Home </h1>

    <a href="logout.php">Logout</a>


    <table>
  
    <thead>
        <tr>
        <th>Place</th>
        <th>Name of place</th>
        <th>Amenities</th>
        <th>Inclusions</th>
        <th>Exclusions</th>
        <th>Days</th>
        <th>Price</th>
        <th>Actions</th>

        </tr>
       
    </thead>
    <tbody>
    <?php
        include('../connection.php');

        $sql = "SELECT * FROM promos ORDER BY id DESC ";
        $run = mysqli_query($conn,$sql);

         if(mysqli_num_rows($run) > 0){
            $count = 0;
            foreach($run as $row){
              $pid = $row['id'];
            // Store the cipher method
            $ciphering = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;

            // Non-NULL Initialization Vector for encryption
            $encryption_iv = '1234567891011121';

            // Store the encryption key
            $encryption_key = "TeamAgnat";

            // Use openssl_encrypt() function to encrypt the data
            $encryption = openssl_encrypt($pid, $ciphering,
                        $encryption_key, $options, $encryption_iv);
            //   $encrypted_data = (($lrn*12345678911*56789)/987654);
              $book_link = "book.php?pid=" . $encryption;
                $count++;

   
        ?>
        <tr>
            <td>
                <?php echo '<img src="uploads/'.$row['place'].'" width="100px"; height:"100px;"' ?>
            </td>
            <td><?php echo $row['name_of_place']?></td>
            <td><?php echo $row['amenities']?></td>
            <td><?php echo $row['inclusions']?></td>
            <td><?php echo $row['exclusions']?></td>
            <td><?php echo $row['days']?></td>
            <td><?php echo $row['price']?></td>
            <td>
            <a href="<?php echo $book_link ?>"> Book</a>
            </td>
        </tr>
        <?php
            }
        }
        ?>

    </tbody>


    </table>
   



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