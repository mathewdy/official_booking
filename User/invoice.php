<?php   
session_start();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$user_id = $_SESSION['user_id'];
include('../connection.php');
include('../session.php');
date_default_timezone_set('Asia/Manila');




$count_pax = "SELECT COUNT(guest_id) FROM guests WHERE user_id = '$user_id'";
$result = mysqli_query($conn,$count_pax);
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





// query of booking

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





//pax na ito 
if($pax == 0){

    
   

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

if($pax == 1){

 
    $find_data = "SELECT * FROM users  
    LEFT JOIN guests 
    ON users.user_id = guests.user_id
    WHERE users.user_id = '$user_id'";
    $result_data = mysqli_query($conn,$find_data);

    if (mysqli_num_rows($result_data) == 1  ){
        $row = mysqli_fetch_array($result_data);
        $guest_id = $row['guest_id'];
        

    } 

    $query_guest = "SELECT * FROM guests WHERE guest_id = $guest_id";
    $run_query_guest = mysqli_query($conn,$query_guest);

    if (mysqli_num_rows($run_query_guest)> 0 ){
        while($row=mysqli_fetch_assoc($run_query_guest)){
    
            $guest_fname = $row['first_name'];
            $guest_mname = $row['middle_name'];
            $guest_lname = $row['last_name'];
            $guest_cnum = $row['contact_number']; 
    
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

    <hr>
    
    <label> First name: '. $guest_fname.'</label>
    <br>
    <label> Middle name: '.$guest_mname.' </label>
    <br>
    <label> Last name: '.$guest_lname.'</label>
    <br>
    <label> Contact number: '.$guest_cnum.' </label>
    <br>
    <label> From: '.$destination_from.'</label>
    <label> '.$departure_date.'</label>
    <br>
    <label> To: '.$destination_to.'</label>
    <label> '.$return_date.'</label>
    <br>

    ';  
 

}


 //start of pax 3 

 if($pax == 2){

 
    $find_data = "SELECT * FROM users  
    LEFT JOIN guests 
    ON users.user_id = guests.user_id
    WHERE users.user_id = '$user_id'";
    $result_data = mysqli_query($conn,$find_data);

    if (mysqli_num_rows($result_data) > 0  ){
        $rows = array();

        while($row = mysqli_fetch_assoc($result_data)){
            $rows[] = $row['guest_id'];
        }

       $guest_id = $rows[0];
       $guest_id_2 = $rows[1];
        

    } 

    //guest 1 

    $query_guest = "SELECT * FROM guests WHERE guest_id = '$guest_id'";
    $run_query_guest = mysqli_query($conn,$query_guest);

    if (mysqli_num_rows($run_query_guest)> 0 ){
        while($row=mysqli_fetch_assoc($run_query_guest)){
    
            $guest_fname = $row['first_name'];
            $guest_mname = $row['middle_name'];
            $guest_lname = $row['last_name'];
            $guest_cnum = $row['contact_number']; 
    
        }
    
    
    }


    //guest 2

    $query_guest = "SELECT * FROM guests WHERE guest_id = '$guest_id_2'";
    $run_query_guest = mysqli_query($conn,$query_guest);

    if (mysqli_num_rows($run_query_guest)> 0 ){
        while($row=mysqli_fetch_assoc($run_query_guest)){
    
            $guest_fname_2 = $row['first_name'];
            $guest_mname_2 = $row['middle_name'];
            $guest_lname_2 = $row['last_name'];
            $guest_cnum_2 = $row['contact_number']; 
    
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

    <hr>
    
    <label> First name: '.$guest_fname.'</label>
    <br>
    <label> Middle name: '.$guest_mname.' </label>
    <br>
    <label> Last name: '.$guest_lname.'</label>
    <br>
    <label> Contact number: '.$guest_cnum.' </label>
    <br>
    <label> From: '.$destination_from.'</label>
    <label> '.$departure_date.'</label>
    <br>
    <label> To: '.$destination_to.'</label>
    <label> '.$return_date.'</label>
    <br>
    <hr>

    <label> First name: '.$guest_fname_2.'</label>
    <br>
    <label> Middle name: '.$guest_mname_2.' </label>
    <br>
    <label> Last name: '.$guest_lname_2.'</label>
    <br>
    <label> Contact number: '.$guest_cnum_2.' </label>
    <br>
    <label> From: '.$destination_from.'</label>
    <label> '.$departure_date.'</label>
    <br>
    <label> To: '.$destination_to.'</label>
    <label> '.$return_date.'</label>
    <br>

    ';  
 

}




 //start of pax 4 

 if($pax == 3){

 
    $find_data = "SELECT * FROM users  
    LEFT JOIN guests 
    ON users.user_id = guests.user_id
    WHERE users.user_id = '$user_id'";
    $result_data = mysqli_query($conn,$find_data);

    if (mysqli_num_rows($result_data) > 0  ){
        $rows = array();

        while($row = mysqli_fetch_assoc($result_data)){
            $rows[] = $row['guest_id'];
        }

       $guest_id = $rows[0];
       $guest_id_2 = $rows[1];
       $guest_id_3 = $rows[2];
        

    } 

    //guest 1 

    $query_guest = "SELECT * FROM guests WHERE guest_id = '$guest_id'";
    $run_query_guest = mysqli_query($conn,$query_guest);

    if (mysqli_num_rows($run_query_guest)> 0 ){
        while($row=mysqli_fetch_assoc($run_query_guest)){
    
            $guest_fname = $row['first_name'];
            $guest_mname = $row['middle_name'];
            $guest_lname = $row['last_name'];
            $guest_cnum = $row['contact_number']; 
    
        }
    
    
    }


    //guest 2

    $query_guest = "SELECT * FROM guests WHERE guest_id = '$guest_id_2'";
    $run_query_guest = mysqli_query($conn,$query_guest);

    if (mysqli_num_rows($run_query_guest)> 0 ){
        while($row=mysqli_fetch_assoc($run_query_guest)){
    
            $guest_fname_2 = $row['first_name'];
            $guest_mname_2 = $row['middle_name'];
            $guest_lname_2 = $row['last_name'];
            $guest_cnum_2 = $row['contact_number']; 
    
        }
    
    
    }

    //guest 3

    $query_guest = "SELECT * FROM guests WHERE guest_id = '$guest_id_3'";
    $run_query_guest = mysqli_query($conn,$query_guest);

    if (mysqli_num_rows($run_query_guest)> 0 ){
        while($row=mysqli_fetch_assoc($run_query_guest)){
    
            $guest_fname_3 = $row['first_name'];
            $guest_mname_3 = $row['middle_name'];
            $guest_lname_3 = $row['last_name'];
            $guest_cnum_3 = $row['contact_number']; 
    
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

    <hr>
    
    <label> First name: '.$guest_fname.'</label>
    <br>
    <label> Middle name: '.$guest_mname.' </label>
    <br>
    <label> Last name: '.$guest_lname.'</label>
    <br>
    <label> Contact number: '.$guest_cnum.' </label>
    <br>
    <label> From: '.$destination_from.'</label>
    <label> '.$departure_date.'</label>
    <br>
    <label> To: '.$destination_to.'</label>
    <label> '.$return_date.'</label>
    <br>

    <hr>

    <label> First name: '.$guest_fname_2.'</label>
    <br>
    <label> Middle name: '.$guest_mname_2.' </label>
    <br>
    <label> Last name: '.$guest_lname_2.'</label>
    <br>
    <label> Contact number: '.$guest_cnum_2.' </label>
    <br>
    <label> From: '.$destination_from.'</label>
    <label> '.$departure_date.'</label>
    <br>
    <label> To: '.$destination_to.'</label>
    <label> '.$return_date.'</label>
    <br>

    <hr>

    <label> First name: '.$guest_fname_3.'</label>
    <br>
    <label> Middle name: '.$guest_mname_3.' </label>
    <br>
    <label> Last name: '.$guest_lname_3.'</label>
    <br>
    <label> Contact number: '.$guest_cnum_3.' </label>
    <br>
    <label> From: '.$destination_from.'</label>
    <label> '.$departure_date.'</label>
    <br>
    <label> To: '.$destination_to.'</label>
    <label> '.$return_date.'</label>
    <br>

    ';  
 

}











$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Legal', 'portrait');

// Render the HTML as PDF
$dompdf->render();



$dompdf->stream("Book", Array("Attachment" =>0));




?>