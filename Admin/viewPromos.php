<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promos Table</title>
</head>
<body>

<table>
    <thead>
        <tr>
        <th>Place</th>
        <th>Name of place</th>
        <th>Inclusions</th>
        <th>Price</th>
        <th>Actions</th>

        </tr>
       
    </thead>
    <tbody>
    <?php
        include('../connection.php');

        $Querytable = "SELECT * FROM promos";
        $Queryrun = mysqli_query($conn, $Querytable);

        while($Row = mysqli_fetch_assoc($Queryrun)){

   
        ?>
        <tr>
            <td>
                <img src="<?php echo "uploads/".$Row['place']; ?>" width="50px"; height="50px";>
            </td>
            <td><?php echo $Row['name_place']?></td>
            <td><?php echo $Row['inclusion']?></td>
            <td><?php echo $Row['price']?></td>

        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    
</body>
</html>