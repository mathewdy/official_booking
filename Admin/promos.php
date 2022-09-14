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
        <input type="text" name="exlusions">
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
    $fileTmpName = $_FILES['places']['tmp_name'];
    $fileSize = $_FILES['places']['size'];
    $fileError = $_FILES['places']['error'];
    $fileType = $_FILES['places']['type'];

    $place = $_POST['name_of_place'];
    $amenities = $_POST['amenities'];
    $inlcusion = $_POST['inclusions'];
    $exlcusions = $_POST['exclusions'];
    $days = $_POST['days'];
    $price = $_POST['price'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg','png','pdf');

    if(in_array($fileActualExt, $allowed))
    {
        if($fileError === 0 )
        {
            if($fileSize < 500000)
            {
                $fileNameNew = uniqid('', true).".".$fileActualExt;

                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                $sql = "INSERT INTO promos(place,name_place,amenities, inclusion, exclusions, days, price) VALUES('$fileNameNew' ,'$place','$amenities','$inlcusion', '$exlcusions','$days','$price')";
                mysqli_query($conn, $sql);
                header("location:promos.php?uploadsuccess");

            }
            else
            {
                echo "Your file is too big";
            }

        }
        else
        {
            "There was an error uploading your file";
        }

    }
    else 
    {
        "You cannot upload files of this type";
    }

   }


?>
</body>
</html>