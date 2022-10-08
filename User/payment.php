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

        

    </form>


<div id="paypal-button-container"></div>
    

<script src="https://www.paypal.com/sdk/js?client-id=ATqOIxEwRpQm2Y8LSuy_1G59KrOuDgZVIqGdMbmjviN7RkPuzQOn0hld5JbXcAm7-ONnsA5r7-OoDQpJ&currency=PHP"></script>
<script>
     paypal.Buttons({
        style: {
        layout: 'horizontal',
        color:  'blue',
        shape:  'pill',
        label:  'pay',
        //if the tagline want to remove uncomment this section
        // tagline: 'false', 
  },
  
    createOrder: function(data,actions){
        return actions.order.create({
            purchase_units:[{
                amount: {
                    value: '<?php echo $total?>',
              
                }
            }]
        });
    },
    onApprove: function(data,actions){
        return actions.order.capture().then(function(details){

            window.location.replace("http://<?php echo $_SERVER['SERVER_NAME']?>/visualstudio/official_booking/User/success.php")
            

        })
    }
      }).render('#paypal-button-container');
    </script>
</body>
</html>


<?php

if(isset($_POST['book'])){

    
    // na comment muna ang query para un comment nalang pag okay na ang paypall
    // wag kalimutan tanggalin ang session ng mga nasa taas 
   

}

?>