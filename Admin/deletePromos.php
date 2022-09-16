<?php
include('../connection.php');
if(isset($_POST['delete_promos']))
{
    $id = $_POST['delete'];

    $query = "DELETE FROM promos WHERE id = '$id'";
    $query_run = mysqli_query($conn , $query);


    if($query_run)
    {
        echo "Promos is deleted";
        header("location:viewPromos.php");
        

    }
    else
    {
        echo "Promo is not deleted";
        header("location:viewPromos.php");
        
    }
}

?>