<?php
include('../connection.php');
if(isset($_POST['delete_payment']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM payments_tbl WHERE id = '$id'";
    $query_run = mysqli_query($conn , $query);


    if($query_run)
    {
        echo "Payment is deleted";
        header("location:viewPromos.php");
        

    }
    else
    {
        echo "Payment is not deleted";
        header("location:viewPromos.php");
        
    }
}

?>