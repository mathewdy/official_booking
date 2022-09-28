<?php


$guest_query_2 = "INSERT INTO `guests`(`user_id`, `guest_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `contact_number`, `email`, `date_time_created`) 
VALUES ('$user_id','$guest_id_2','$phase_3_fname' , '$phase_3_mname','$phase_3_lname ','$phase_3_bday','$phase_3_cnum','$phase_3_email','$dateCreated')";

$run_guest_query_2 = mysqli_query($conn,$guest_query_2);



if($run_guest_query_2){
          
echo "<script>alert('Successful booking')</script>";

}

else{

$conn->error;
}

?>

