<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID </th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
             include('../connection.php');
            // $sql = "SELECT u.id,u.user_id , u.first_name, u.middle_name, u.last_name, u.email , u.contact_number , g.user_id, g.guest_id FROM guests AS g LEFT JOIN users AS u ON u.user_id = g.user_id;";
            $sql = "SELECT * FROM users";
            $query = mysqli_query($conn , $sql);

            while($row = mysqli_fetch_assoc($query)){

                ?>
                <tr>

                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['user_id']?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['middle_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['contact_number']?></td>
                    <td>
                        <form action="pdf.php" method="GET">
                            <input type="hidden" name="id_invoice" value="<?php echo $row['id']?>">
                            <button type="submit" name="invoice">Invoice</button>
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