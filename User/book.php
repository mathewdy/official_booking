<?php
session_start();
$user_id = $_SESSION['user_id'];
echo $contact_number = $_SESSION['contact_number'];

include('../connection.php');
include('../session.php');
date_default_timezone_set('Asia/Manila');

$query_contact_number = "SELECT contact_number FROM users WHERE user_id = '$user_id' ";
$run_contact_number = mysqli_query($conn,$query_contact_number);

if(mysqli_num_rows($run_contact_number) > 0){
    foreach($run_contact_number as $row_contact){
         $row_contact ['contact_number'] ;
    }
}


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
    
    if(empty($_GET['pid'])){    // place verification starts here
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
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Book</title>        
</head>
<body class="bg-dark-accent">
<div class="container">
        <div class="row gy-4 d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-5 col-sm-12 ">
                <div class="card bg-bright-dark-accent" style="border:none; border-radius: 30px;">
                    <form action="" class="bg-bright-dark-accent px-4 py-2"  style="border:none; border-radius: 25px;" method="POST">
                        <div class="row g-4 p-2" style="border:none;">
                            <div class="col-lg-12">
                            <label class="text-whitesmoke"  for="">Destination From:</label>
                            <input type="text" name="destination_from">
                            <label class="text-whitesmoke"  for="">Destination To:</label>
                            <input type="text" name="destination_to"  value="<?php if($place == $place) { echo "$place"; } else {"";} ?>" readonly>
                            <label class="text-whitesmoke"  for="">Departure Date:</label>
                            <input type="date" name="departure_date">
                            <Br>

                            <label class="text-whitesmoke"  for="">How many person</label>

                                <select name="pax">
                                <option value="0">-Select-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="col-lg-12 text-center d-flex flex-column align-items-center">
                                <input type="submit" class="btn btn-pink text-white text-center w-50 py-2 mb-2" name="book" value="Book">
                            
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['book'])){
  
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


// tanggalin ang query na booking kasi hindi pa yan dito papasok sa payment na sya ilagay

// gawin ito the rest in the pax  

// pwedeng session nalang ang pax para mas madali 

if($pax == 1){

  $_SESSION['destination_from'] = $destination_from;
  $_SESSION['destination_to'] = $destination_to;
  $_SESSION['pax '] = $pax ;
  $_SESSION['departure_date'] = $departure_date;
  $_SESSION['return_date'] = $return_date;
  $_SESSION['place'] = $place;
      
  echo "<script>alert('Successful booking')</script>";
  header("location: payment.php");


}

// two booking

else if ($pax == 2 ){

  $_SESSION['destination_from'] = $destination_from;
  $_SESSION['destination_to'] = $destination_to;
  $_SESSION['pax '] = $pax ;
  $_SESSION['departure_date'] = $departure_date;
  $_SESSION['return_date'] = $return_date;
  $_SESSION['place'] = $place;
  header("location: book-phase_2.php");    

        
}


else if($pax == 3){

  $_SESSION['destination_from'] = $destination_from;
  $_SESSION['destination_to'] = $destination_to;
  $_SESSION['pax '] = $pax ;
  $_SESSION['departure_date'] = $departure_date;
  $_SESSION['return_date'] = $return_date;
  $_SESSION['place'] = $place;

    header("location: book-phase_3.php");    
    

}

else if($pax == 4){

  $_SESSION['destination_from'] = $destination_from;
  $_SESSION['destination_to'] = $destination_to;
  $_SESSION['pax '] = $pax ;
  $_SESSION['departure_date'] = $departure_date;
  $_SESSION['return_date'] = $return_date;
  $_SESSION['place'] = $place;


    header("location: book-phase_4.php");    
    


}






  
}
}

?>

