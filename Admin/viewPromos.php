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
                <?php echo '<img src="uploads/'.$Row['place'].'" width="100px"; height:"100px;"' ?>
            </td>
            <td><?php echo $Row['name_of_place']?></td>
            <td><?php echo $Row['amenities']?></td>
            <td><?php echo $Row['inclusions']?></td>
            <td><?php echo $Row['exclusions']?></td>
            <td><?php echo $Row['days']?></td>
            <td><?php echo $Row['price']?></td>
            <td>
                <form action="editPromos.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $Row['id'];?>">
                    <button type="submit" name="edit_promos">Edit</button>
                </form>
            </td>
            <td>
                <form action="deletePromos.php" method="POST">
                    <input type="hidden" name="delete" value="<?php echo $Row['id'];?>">
                    <button type="submit" name="delete_promos">Delete</button>
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    
</body>
</html>