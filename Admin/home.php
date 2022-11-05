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
    <link rel="stylesheet" href="../output.css">
    <title>Home</title>
</head>
<body class="bg-slate-500">
    <a href="admin_logout.php">Logout</a>
    <h2 ><?php echo $_SESSION['admin']?></h2>
    <a href="promos.php">Promo</a>
    <a href="admin_logout.php">Logout</a>
    <a href="Proof_of_payment.php">Proof of payment</a>
    <a href="UsersTable.php">Generate invoice</a>
    
</body>
</html>