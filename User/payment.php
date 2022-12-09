<?php
session_start();
$contact_number = $_SESSION['contact_number'];

$user_id = $_SESSION['user_id'];

$destination_from = $_SESSION['destination_from'];
$pax = $_SESSION['pax '];
$departure_date = $_SESSION['departure_date'];
$return_date = $_SESSION['return_date'];
$place = $_SESSION['place'];
$destination_to = $_SESSION['destination_to'];


$conn = new mysqli("localhost", "root" , "", "booking_system");
if(empty($_SESSION['email'])){
    echo "<script>window.location.href='login.php' </script>";
}
if(empty($user_id)){
    echo "<script>window.location.href='login.php' </script>";
}
date_default_timezone_set('Asia/Manila');


$query = "SELECT `name_of_place`, `price` FROM `promos` WHERE name_of_place = '$place'";
$run_query = mysqli_query($conn,$query);
if(mysqli_num_rows($run_query)> 0){
    $row = mysqli_fetch_array($run_query);
    $price = $row['price'];
    $total = $pax * $price;
    $_SESSION['total'] = $total;
}


$query_contact_number = "SELECT contact_number FROM users WHERE user_id = '$user_id' ";
$run_contact_number = mysqli_query($conn,$query_contact_number);

if(mysqli_num_rows($run_contact_number) > 0){
    foreach($run_contact_number as $row_contact){
         $row_contact ['contact_number'] ;
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
    <title>Payment</title>
</head>
<body class="bg-dark-accent" style="overflow-x: hidden;">
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
<div class="container">
    <div class="row mt-5 d-flex justify-content-center align-items-start ">
        <div class="col-lg-8 col-sm-12">
            <div class="card bg-bright-dark-accent p-5" style="border-radius: 0; background: #393E46;">
                <form action="" class="" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="text-white display-6 mt-3 mb-5">Booking Details</h1>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="text-white"  for="">Destination From :</label>
                                    <input type="text" class="form-control py-2 px-0" name="destination_from" style="border: none; outline:none; background: none; pointer-events: none; color: rgba(255,255,255,0.6);" value=" <?php echo "$destination_from" ?>" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-white" for="">Destination To :</label>
                                    <input type="text"  class="form-control py-2 px-0" style="border: none; outline:none; background: none; pointer-events: none; color: rgba(255,255,255,0.6);" value="<?php if($place == $place) { echo "$place"; } else {"";} ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="text-white" for="">Departure Date :</label>
                                    <input type="text"  class="form-control py-2 px-0" name="departure_date" style="border: none; outline:none; background: none; pointer-events: none; color: rgba(255,255,255,0.6);" value=" <?php $depart = date('F d, Y', strtotime($departure_date)); echo "$depart" ?>" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-white" for="">Return Date :</label>
                                    <input type="text"  class="form-control py-2 px-0" name="return_date" style="border: none; outline:none; background: none; pointer-events: none; color: rgba(255,255,255,0.6);" value=" <?php echo $return = date('F d, Y', strtotime($return_date)); "$return" ?>"readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5">
                            <a href="index.php" class="btn btn-sm btn-pink text-light px-5" style="border-radius: 0;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4 mt-md-3 d-flex align-items-center">
            <div class="card w-100 bg-bright-dark-accent p-5 pt-3" style="border-radius: 0; background: #393E46;">
                <p class="h5 lead text-white text-center pt-0 ">Pay Via Paypal</p>
                <hr class="featurette-divider mb-5">
                <label class="text-white" for="">Total Price :</label>
                <input type="text"  class="form-control py-2 mb-5" style="border-radius: 0;" name="return_date" value=" <?php echo "$total" ?>"readonly>
                <div id="paypal-button-container" class="w-100"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=ATqOIxEwRpQm2Y8LSuy_1G59KrOuDgZVIqGdMbmjviN7RkPuzQOn0hld5JbXcAm7-ONnsA5r7-OoDQpJ&currency=PHP
">
</script>
    <script>
        paypal.Buttons({
            createOrder: function(data,actions){
        return actions.order.create({
            purchase_units:[{
                amount: {
                    value: '<?php echo $total ?>',
              
                }
            }]
        });
    }, onApprove: function(data,actions){
        return actions.order.capture().then(function(details){

            window.location.replace("http://<?php echo $_SERVER['SERVER_NAME']?>/official_booking/User/success.php")
            

        })
    }
        }).render('#paypal-button-container');        

    </script>
    <script src="../popper.js"></script>

<!-- <script src="../src/styles/bs-5/@popperjs/core/dist/umd/popper.js"></script> -->
<script src="../src/styles/bs-5/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
function sendMail($email,$destination_to,$total,$referrence_number,$image,$message){
require_once 'PHPMailer2/Exception.php';
require_once 'PHPMailer2/PHPMailer.php';
require_once 'PHPMailer2/SMTP.php';
$mail = new PHPMailer(true);

   //email token sent 
   try{
        
    $mail->isSMTP();
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mathewdalisay@gmail.com';
    $mail->Password = 'dproewbecisldhec';
    $mail->SMTPSecure = "tls";
    $mail->Port = '587';
    $mail->setFrom('mathewdalisay@gmail.com', 'Maris Travel & Tours agency by WCA');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Proof of Payment';
    $mail->Body = $message;
    $mail->addAttatchment($image, 'Proof of Payment');
    $mail->send();

    echo "<script>alert('Check your spam or junk mails') </script>";

}catch(Exception $e){
    echo "Error" .$e->getMessage();
}

}


if(isset($_POST['send_payment'])){
    date_default_timezone_set('Asia/Manila');
    $dateCreated = date("Y-m-d h:i:s");
    $dateUpdated = date("Y-m-d h:i:s");

    $email = "mathewdalisay@gmail.com";
    $referrence_number = $_POST['referrence_number'];
    $message = "This is a proof of payment for" . $destination_to . "amounting" . $total . $referrence_number ;
    $image = $_FILES['image']['name'];
    $status = '0';


    //allowed files
    $query_book = "INSERT INTO `books`(`user_id` , `destination_from`, `destination_to`, `departure_date`, `return_date`,`status`,`date_time_created`,`date_time_updated`) 
    VALUES ('$user_id', '$destination_from', '$place', '$departure_date', '$return_date','$status', '$dateCreated', ' $dateUpdated')" ;
    $run_query_book = mysqli_query($conn,$query_book) && sendMail($email,$destination_to,$total,$referrence_number,$image,$message);

    if($run_query_book){
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES["image"]["name"]);
        echo "Added booking";
    }else{
        echo "error" . $conn->error;
    }
}
?>