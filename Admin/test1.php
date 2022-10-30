<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include('../connection.php');
if(isset($_POST['invoice'])){
    $id_try = $_POST['id_invoice'];






    $sql = "SELECT * FROM guests WHERE id = '$id_try'";
    $run = mysqli_query($conn , $sql);
    foreach($run as $row){

        ?>

        <?php $row[''] ?>
        
        
        <h2><?php echo $row['first_name'] ?></h2>


        <?php
    }
}

?>

    
</body>
</html>