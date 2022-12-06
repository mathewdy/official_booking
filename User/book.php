<?php
session_start();
$user_id = $_SESSION['user_id'];
$contact_number = $_SESSION['contact_number'];
ob_start();
$conn = new mysqli("localhost", "root" , "", "booking_system");

if($conn == FALSE){
    echo "error";
}

if(empty($_SESSION['email'])){
  echo "<script>window.location.href='login.php' </script>";
}
if(empty($user_id)){
  echo "<script>window.location.href='login.php' </script>";
}


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
<nav class="navbar navbar-expand-lg bg-bright-dark-accent navbar-dark">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#"></a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
            <!-- <li><a class="dropdown-item" href="">History</a></li> -->
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>  
<div class="container my-5">
        <div class="row p-5 d-flex justify-content-center align-items-center">
            <div class="col-lg-5 col-sm-12">
                <div class="card bg-bright-dark-accent py-5" style="border-radius: 0; background: #393E46;">
                    <form action="" class="" method="POST">
                        <div class="row p-5" style="border:none;">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="col-lg-6 mb-3">
                                  <label class="text-whitesmoke"  for="">Destination From:</label>
                                  <select name="destination_from" id="" class="form-select py-1">
                                    <option value="Manila">Manila</option>
                                    <option value="Quezon City">Quezon City</option>
                                    <option value="Caloocan">Caloocan</option>
                                    <option value="Las Piñas">Las Piñas</option>
                                    <option value="Makati">Makati</option>
                                    <option value="Malabon">Malabon</option>
                                    <option value="Mandaluyong">Mandaluyong</option>
                                    <option value="Marikina">Marikina</option>
                                    <option value="Muntinlupa">Muntinlupa</option>
                                    <option value="Navotas">Navotas</option>
                                    <option value="Parañaque">Parañaque</option>
                                    <option value="Pasay">Pasay</option>
                                    <option value="San Juan">San Juan</option>
                                    <option value="Taguig">Taguig</option>
                                    <option value="Valenzuela">Valenzuela</option>
                                  </select>
                                </div>
                                <div class="col-lg-6 mb-3">
                                  <label class="text-whitesmoke"  for="">Destination To:</label>
                                  <input type="text" name="destination_to" class="form-control py-1"  value="<?php if($place == $place) { echo "$place"; } else {"";} ?>" readonly>
                                </div>
                                <div class="col-lg-12 mb-3">
                                  <label class="text-whitesmoke"  for="">Departure Date:</label>
                                  <input type="date" name="departure_date" class="form-control py-1">
                                </div>
                                <div class="col-lg-12 mb-5">
                                  <label class="text-whitesmoke"  for="">How many person</label>
                                  <select name="pax" class="form-select py-1">
                                  <option value="0">-Select-</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                  </select>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                  <input type="submit" class="btn btn-pink text-white text-center py-2 w-50" name="book" value="Book">
                                  <a href="index.php" class="btn btn-secondary py-2 w-50">Cancel</a>
                                </div>
                              </div>
                            
                           
                            
                            <Br>

                            
                            <div class="col-lg-12 text-center d-flex flex-column align-items-center">
                            
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

