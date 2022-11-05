<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Image</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Lastname</th>
            <th>Contact Number</th>
            <th>Email</th>

        </tr>
    </thead>

    <tbody>
        <?php
        include('../connection.php');

        $Querytable = "SELECT pay.id, pay.user_id, pay.proof_of_payment, u.first_name, u.middle_name, u.last_name, u.contact_number, u.email FROM payments_tbl AS pay LEFT JOIN users As u ON pay.user_id = u.user_id";
        $Queryrun = mysqli_query($conn, $Querytable);

        while($Row = mysqli_fetch_assoc($Queryrun)){
            ?>

            <tr>
                <td><?php echo $Row['id']?></td>
                <td><?php echo $Row['user_id']?></td>
                <td>
                <?php echo '<img src="Proof_Payment/'.$Row['proof_of_payment'].'" width="100px"; height:"100px;"' ?>
                </td>
                <td><?php echo $Row['first_name']  ?></td>
                <td><?php echo $Row['middle_name']?></td>
                <td><?php echo $Row['last_name']?></td>
                <td><?php echo $Row['contact_number']?></td>
                <td><?php echo $Row['email']?></td>
                <td>
                    <form action="delete_payment.php" method="POST">
                        <input type="hidden" 
                        name="delete_id"
                        value="<?php echo $Row['id']?>">

                        <button type="submit"
                        name="delete_payment">Delete

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