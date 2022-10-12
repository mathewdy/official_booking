<?php   
session_start();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$user_id = $_SESSION['user_id'];
include('../connection.php');
include('../session.php');
date_default_timezone_set('Asia/Manila');

print_r($user_id);


$query_pax = "SELECT COUNT(guest_id) FROM guests WHERE user_id = '$user_id'";
$result = mysqli_query($conn,$query_pax);
$row=mysqli_fetch_array($result);

$pax = $row[0];
// end of counting paxs


// start of invoice

//DESIGN

$html='
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>



</style>


';

// codes



$query_user = "SELECT `user_id`, `first_name`, `middle_name`, `last_name` , `contact_number`
FROM `users` WHERE user_id = '$user_id'";
$run_query_user = mysqli_query($conn,$query_user);

if (mysqli_num_rows($run_query_user)>0){
    while($row=mysqli_fetch_assoc($run_query_user)){

        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $contact_number = $row ['contact_number']; 

    }


}

$html.='

    <h1> Welcome to your motherfuckin flight </h1>

    <br>

    <label> First name: '.$first_name.'</label>
    <br>
    <label> Middle name: '.$middle_name.' </label>
    <br>
    <label> Last name: '.$last_name.'</label>
    <br>
    <label> Contact number: '.$contact_number.' </label>
     
';





//pax na ito 

$a = 2;

if($a == 1){


    $query_booking_1 = "SELECT user_id, destination_from, destination_to, departure_date, return_date 
    FROM books WHERE  user_id = '$user_id'";
    $run_query_booking_1 = mysqli_query($conn,$query_booking_1);
    
    
    if (mysqli_num_rows($run_query_booking_1)>0){
        while($row=mysqli_fetch_assoc($run_query_booking_1)){
            $destination_from = $row['destination_from'];
            $destination_to = $row['destination_to'];
            $departure_date = $row['departure_date'];
            $return_date = $row['return_date'];
        }
    
    
    }

    $html.='
    <br>
    <label> From: '.$destination_from.'</label>
    <label> '.$departure_date.'</label>
    <br>
    <label> To: '.$destination_to.'</label>
    <label> '.$return_date.'</label>
    <br>
    
   
     
';
    
    
    } // end of pax 1 


    //start of pax 2 

if($a == 2){

    


}






$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Legal', 'portrait');

// Render the HTML as PDF
$dompdf->render();



$dompdf->stream("Placido del monte", Array("Attachment" =>0));




?>