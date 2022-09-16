<?php
session_start();

if(isset($_SESSION['admin'])){
    header("localhost:index.php?action=login");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>promos</title>
</head>
<body style="background-color:#ccc;">
    <form action="#" method="POST" enctype="multipart/form-data">
        <label>Places</label>
        <input type="file" name="places">
        <input type="text" name="name_of_place">
        <br>
        <label>Amenities</label>
        <input type="text" name="amenities">
        <br>
        <label>Inclusions</label>
        <input type="text" id="inclusions" name="inclusions">
        <br>
        <label>Exclusions</label>
        <input type="text" name="exclusions">
        <label>Days</label>
        <input type="text" name="days">
        <label>Price</label>
        <input type="text" name="price">
        <br>
        <input type="submit" name="submit"> 
    </form>
    


<script>


</script>

<?php 
   include('../connection.php');

   if(isset($_POST['submit']))
   {
    $fileName = $_FILES['places']['name'];

    $place = $_POST['name_of_place'];
    $amenities = $_POST['amenities'];
    $inlcusion = $_POST['inclusions'];
    $exlcusions = $_POST['exclusions'];
    $days = $_POST['days'];
    $price = $_POST['price'];

    // $validate_img_extension = $_FILES['places']['type']=='image/jpg' || $_FILES['places']['type']=='image/png' || $_FILES['places']['type']=='image/jpeg';

    $img_types = array('img/jpg','image/png','image/jpeg');
    $validate_img_extension = in_array($_FILES['places']['type'],$img_types);


    if($validate_img_extension)
    {
        if(file_exists("uploads/".$_FILES['places']['name']))
        {
            $store = $_FILES['places']['name'];
            echo "Image already exist".$store;

        }
        else
        {
            $sql = "INSERT INTO promos(place,name_of_place,amenities, inclusions, exclusions, days, price) VALUES('$fileName' ,'$place','$amenities','$inlcusion', '$exlcusions','$days','$price')";
            $query_run = mysqli_query($conn, $sql);
            header("location:promos.php?uploadsuccess");

            if($query_run){
                move_uploaded_file($_FILES['places']['tmp_name'], "uploads/".$_FILES['places']['name']);
                echo "<script>alert('faculty added')</script>";
                header('location: promos.php');
            }
            else{
                echo "Error".$sql."<br>".$conn->error;
            }

        }

    }
    
    else{
        echo "only jpgs jpegs, pngs";
    }
}


        

?>
</body>
</html>