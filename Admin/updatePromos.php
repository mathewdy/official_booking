<?php 
include('../connection.php');   
if(isset($_POST['update'])){
    $edit_id = $_POST['Edit_id'];
    $image = $_FILES['places']['name'];
    $edit_amenities = $_POST['edit_amenities'];
    $edit_name_of_place = $_POST['edit_name_place'];
    $edit_inclusions = $_POST['edit_inclusions'];
    $edit_exclusions = $_POST['edit_exclusions'];
    $edit_days = $_POST['edit_days'];
    $edit_price = $_POST['edit_price'];

    $image_query = "SELECT * FROM promos WHERE id='$edit_id'";
    $image_run = mysqli_query($conn , $image_query);
    foreach($image_run as $image_row){

        if($image == NULL)
        {
            $image_data = $image_row['place'];
        }

        else
        {
            if($img_path = "uploads/".$image_row['place'] )
            {
                unlink($img_path);
                $image_data = $image;

            }
        }

    }


    $Sql = "UPDATE promos SET place = '$image_data',name_of_place = '$edit_name_of_place',  amenities = '$edit_amenities' , inclusions = '$edit_inclusions' , exclusions = '$edit_exclusions' , days = '$edit_days' , price = '$edit_price' WHERE id = '$edit_id'";

    $run = mysqli_query($conn , $Sql);
    if($run){
        if($image == NULL)
        {
            //Update with existing Image
            echo "successfully deleted and changed";
        }
        else{
            move_uploaded_file($_FILES['places']['tmp_name'],"uploads/".$_FILES['places']['name']);
            echo "successfully changed";
        }
        

    }
    else
    {
        echo "ERROR".$Sql."<br>".$conn->error;
    }
    
}
?>