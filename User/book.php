<?php
session_start();
$user_id = $_SESSION['user_id'];
include('../connection.php');
include('../session.php');
date_default_timezone_set('Asia/Manila');


if(isset($_GET['pid'])){
  // Store the cipher method
  $ciphering = "AES-128-CTR";
  $options = 0;
  // Non-NULL Initialization Vector for decryption
  $decryption_iv = '1234567891011121';

  // Store the decryption key
  $decryption_key = "TeamAgnat";

  // Use openssl_decrypt() function to decrypt the data
  $decrypted_pid=openssl_decrypt ($_GET['pid'], $ciphering,
      $decryption_key, $options, $decryption_iv);
  // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
  //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
  //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
  // }
    
    if(empty($_GET['pid'])){    //lrn verification starts here
        echo "<script>alert('LRN not found');
        window.location = 'home.php';</script>";
        exit();
    }

    else {

      $gen_place = "SELECT `id`, `name_of_place` FROM `promos` WHERE id = '$decrypted_pid'";
      $run_gen_place = mysqli_query($conn,$gen_place);

      if(mysqli_num_rows($run_gen_place) >0  ){
          while($row=mysqli_fetch_assoc($run_gen_place)){
          
            $place = $row['name_of_place'];
          
          }
      }
     
      
    }


    $verify_place = "SELECT `id` FROM `promos` WHERE id = '$decrypted_pid'";
    $run_verify_place = mysqli_query($conn,$verify_place);
    if(mysqli_num_rows($run_verify_place) == 0){
      echo "
      <script type = 'text/javascript'>
      window.location = 'index.php';
      </script>";
      exit();
      }
    }
  
   



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>        
</head>
<body>
  
  
      <form action="" method = "POST"> 

        <label for="">Destination From:</label>
        <input type="text" name="destination_from">
        <label for="">Destination To:</label>
        <input type="text"  value="<?php echo"$place"; ?>" readonly>
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
  $destination_from = $_POST['destination_from'];
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
 

 if(empty($departure_date)){
      echo '<script>alert("Please input a departure date")</script>' ;
  }
 





 // validating of booking
 $validation_book = "SELECT `departure_date` FROM `books` WHERE departure_date = '$departure_date' AND  user_id = '$user_id'";
 $validate = mysqli_query($conn,$validation_book);
 
if(mysqli_num_rows($validate) > 0  ){
  while($row=mysqli_fetch_assoc($validate)){
  
      if ($row['departure_date'] == $departure_date ){
        echo '<script>alert("Already book")</script>' ;
      }
   }
  }
  else{

    // query of single booking
   
// single booking 

if($pax == 1){

  $query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`, `date_time_created`) 
  VALUES ('$user_id', '$destination_from', '$place', '$departure_date', '$return_date', '$dateCreated')";
  $run_query_book = mysqli_query($conn,$query_book);

  

  if($run_query_book){
      
    echo "<script>alert('Successful booking')</script>";

  }

  else{

    $conn->error;
  }

}

// two booking

else if ($pax == 2 ){


  $query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`, `date_time_created`) 
  VALUES ('$user_id', '$destination_from', '$place', '$departure_date', '$return_date', '$dateCreated')";
  $run_query_book = mysqli_query($conn,$query_book);

  

  if($run_query_book){

   

    header("location: book-phase_2.php");    
    

  }

  else{

    $conn->error;
  }

  
 
        
}


else if($pax == 3){
  $query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`, `date_time_created`) 
  VALUES ('$user_id', '$destination_from', '$place', '$departure_date', '$return_date', '$dateCreated')";
  $run_query_book = mysqli_query($conn,$query_book);

  

  if($run_query_book){

    

    header("location: book-phase_3.php");    
    

  }

  else{

    $conn->error;
  }








}

else if($pax == 4){

  $query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`, `date_time_created`) 
  VALUES ('$user_id', '$destination_from', '$place', '$departure_date', '$return_date', '$dateCreated')";
  $run_query_book = mysqli_query($conn,$query_book);

  

  if($run_query_book){

    

    header("location: book-phase_4.php");    
    

  }

  else{

    $conn->error;
  }







}






  
}
}

?>

