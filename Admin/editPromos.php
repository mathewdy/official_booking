<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Promos</title>
</head>
<body>

<?php
include('../connection.php');
if(isset($_POST['edit_promos']))
{
    $id = $_POST['edit_id'];

    $Sql = "SELECT * FROM promos WHERE id = '$id'";
    $Run = mysqli_query($conn, $Sql);

    foreach($Run as $row){
        ?>

<form action="updatePromos.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="Edit_id" value="<?php echo $row['id'];?>">
    <label>Image of Place</label>
    <input type="file" name="places" value="<?php echo $row['place']?>">
    <br>
    <label>Name of Place</label>
    <input type="text" name="edit_name_place" value="<?php echo $row['name_of_place']?>">
    <br>
    <label>Amenities</label>
    <input type="text" name="edit_amenities" value="<?php echo $row['amenities']?>">
    <br>
    <label>Inclusions</label>
    <input type="text" name="edit_inclusions" value="<?php echo $row['inclusions']?>">
    <br>
    <label>Exclusions</label>
    <input type="text" name="edit_exclusions" value="<?php echo $row['exclusions']?>">
    <br>
    <label>Days</label>
    <input type="text" name="edit_days" value="<?php echo $row['days']?>">
    <br>
    <label>Price</label>
    <input type="text" name="edit_price" value="<?php echo $row['price']?>">

    <input type="submit" name="update" value="update">
    
</form>





<?php
    }

}

?>



    
</body>
</html>