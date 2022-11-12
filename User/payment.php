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
<body class="bg-dark-accent">
    <div class="row gy-4 d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-5 col-sm-12 ">
            <div class="card bg-bright-dark-accent" style="border:none; border-radius: 30px;">
            <form action = "" class="bg-bright-dark-accent px-4 py-2"  style="border:none; border-radius: 25px;" method="POST">
            <h1 class="text-white text-center">Booking Details</h1>
            <div class="col-lg-12">
            <label class="text-white"  for="">Destination From:</label>
        <input type="text" class="form-control py-2" name="destination_from" value=" <?php echo "$destination_from" ?>" readonly>
            
            </div>
            <div class="col-lg-12">
            <label class="text-white" for="">Destination To:</label>
        <input type="text"  class="form-control py-2" value="<?php if($place == $place) { echo "$place"; } else {"";} ?>" readonly>
            </div>
            <div class="col-lg-12">
            <label class="text-white" for="">Departure Date</label>
        <input type="text"  class="form-control py-2" name="departure_date" value=" <?php echo "$departure_date" ?>" readonly>
            </div>


            <div class="col-lg-12">
            <label class="text-white" for="">Return Date </label>
        <input type="text"  class="form-control py-2" name="return_date" value=" <?php echo "$return_date" ?>"readonly>
            </div>

            <div class="col-lg-12">
            <label class="text-white" for="">Price</label>
        <input type="text"  class="form-control py-2" name="return_date" value=" <?php echo "$total" ?>"readonly>
            </div>

            </form>
            </div>

        </div>

    </div>

<div id="paypal-button-container"></div>
    

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

            window.location.replace("http://<?php echo $_SERVER['SERVER_NAME']?>/visualstudio/official_booking/User/success.php")
            

        })
    }
        }).render('#paypal-button-container');        

    </script>

</body>
</html>
