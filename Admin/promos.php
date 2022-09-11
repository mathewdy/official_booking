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
        <label>Inclusions</label>
        <input type="text" id="inclusions" name="inclusions">
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
    $inlcusion = $_POST['inclusions'];
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

                $sql = "INSERT INTO promos(place,name_place, inclusion, price) VALUES('$fileNameNew' ,'$place','$inlcusion','$price')";
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